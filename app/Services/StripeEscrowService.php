<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Wallet;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Stripe\StripeClient;

class StripeEscrowService
{
    protected $stripe;

    public function __construct()
    {
        $this->stripe = new StripeClient(config('services.stripe.secret'));
    }

    /**
     * Create a PaymentIntent with manual capture (Escrow).
     */
    public function createEscrowIntent(User $buyer, float $amount, string $currency = 'usd')
    {
        return $this->stripe->paymentIntents->create([
            'amount' => $amount * 100, // cents
            'currency' => $currency,
            'payment_method_types' => ['card'],
            'capture_method' => 'manual',
            'metadata' => [
                'buyer_id' => $buyer->id,
            ],
        ]);
    }

    /**
     * Capture funds once the buyer confirms receipt.
     */
    public function captureFunds(string $paymentIntentId)
    {
        return $this->stripe->paymentIntents->capture($paymentIntentId);
    }

    /**
     * Move captured funds to the vendor's available balance in the wallet.
     */
    public function releaseToWallet(Order $order)
    {
        return DB::transaction(function () use ($order) {
            // Get the vendor (team owner)
            $vendor = $order->vendor->owner;
            $amount = $order->total_amount;

            $wallet = Wallet::firstOrCreate(['user_id' => $vendor->id]);
            
            $wallet->decrement('pending_balance', $amount);
            $wallet->increment('available_balance', $amount);
            
            $order->update(['status' => 'captured']);

            return $wallet;
        });
    }

    /**
     * Add to pending balance when order is authorized.
     */
    public function markAsAuthorized(Order $order, string $paymentIntentId)
    {
        $order->update([
            'stripe_payment_intent_id' => $paymentIntentId,
            'status' => 'authorized'
        ]);

        $vendor = $order->vendor->owner;
        $wallet = Wallet::firstOrCreate(['user_id' => $vendor->id]);
        $wallet->increment('pending_balance', $order->total_amount);
    }
}
