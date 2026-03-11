<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class VendorKyc extends Component
{
    use WithFileUploads;

    public $step = 1;
    public $business_name;
    public $business_type;
    public $country;
    public $document_type;
    public $document_file;

    public function nextStep()
    {
        $this->step++;
    }

    public function submit()
    {
        // Mock submission
        session()->flash('message', 'KYC Documents submitted successfully! Our team will review them within 24 hours.');
        return redirect()->route('marketplace');
    }

    public function render()
    {
        return view('livewire.vendor-kyc')->layout('layouts.marketplace');
    }
}
