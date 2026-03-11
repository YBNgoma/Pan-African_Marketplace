<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductTier;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // Create Demo Admin & Vendors
        $admin = User::factory()->create([
            'name' => 'Marketplace Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        $vendorUser1 = User::factory()->create([
            'name' => 'Amina Mansour',
            'email' => 'amina@atlas-textiles.com',
            'password' => Hash::make('password'),
        ]);

        $vendorUser2 = User::factory()->create([
            'name' => 'Kofi Mensah',
            'email' => 'kofi@ghana-cocoa.com',
            'password' => Hash::make('password'),
        ]);

        // Create Vendor Teams (Shops)
        $team1 = Team::forceCreate([
            'user_id' => $vendorUser1->id,
            'name' => 'Atlas Textiles Morocco',
            'personal_team' => false,
        ]);

        $team2 = Team::forceCreate([
            'user_id' => $vendorUser2->id,
            'name' => 'Gold Coast Cocoa Exports',
            'personal_team' => false,
        ]);

        // Fix Admin current team
        $admin->current_team_id = $team1->id;
        $admin->save();

        // Categories
        $categories = [
            ['name' => 'Textiles & Apparel', 'slug' => 'textiles-apparel'],
            ['name' => 'Agriculture & Food', 'slug' => 'agriculture-food'],
            ['name' => 'Electronics', 'slug' => 'electronics'],
            ['name' => 'Handicrafts', 'slug' => 'handicrafts'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        $textileCat = Category::where('slug', 'textiles-apparel')->first();
        $agriCat = Category::where('slug', 'agriculture-food')->first();

        // Products for Atlas Textiles
        $p1 = Product::create([
            'team_id' => $team1->id,
            'category_id' => $textileCat->id,
            'name' => 'Premium Egyptian Cotton Fabric',
            'slug' => 'premium-egyptian-cotton-fabric',
            'description' => 'High-quality 100% Egyptian cotton fabric, ideal for luxury apparel manufacturing. Available in multiple colors.',
            'unit_price' => 25.00,
            'stock_quantity' => 5000,
            'status' => 'active',
        ]);

        ProductTier::create(['product_id' => $p1->id, 'min_quantity' => 50, 'unit_price' => 20.00]);
        ProductTier::create(['product_id' => $p1->id, 'min_quantity' => 200, 'unit_price' => 15.00]);

        // Products for Gold Coast Cocoa
        $p2 = Product::create([
            'team_id' => $team2->id,
            'category_id' => $agriCat->id,
            'name' => 'Raw Organic Cocoa Beans',
            'slug' => 'raw-organic-cocoa-beans',
            'description' => 'Grade A organic cocoa beans harvested from the Ashanti region. Fermented and dried to perfection.',
            'unit_price' => 4.50,
            'stock_quantity' => 10000,
            'status' => 'active',
        ]);

        ProductTier::create(['product_id' => $p2->id, 'min_quantity' => 500, 'unit_price' => 3.75]);
        ProductTier::create(['product_id' => $p2->id, 'min_quantity' => 2000, 'unit_price' => 3.20]);

        // Create Demo Reviewers
        $reviewer1 = User::factory()->create(['name' => 'Fatima Toure', 'email' => 'fatima@example.com']);
        $reviewer2 = User::factory()->create(['name' => 'Kwame Boateng', 'email' => 'kwame@example.com']);
        $reviewer3 = User::factory()->create(['name' => 'Sara El-Sayed', 'email' => 'sara@example.com']);

        // Reviews for Egyptian Cotton
        \App\Models\Review::create([
            'user_id' => $reviewer1->id,
            'product_id' => $p1->id,
            'rating' => 5,
            'comment' => 'Exceptional quality! The texture is exactly what our luxury line needed.',
        ]);
        \App\Models\Review::create([
            'user_id' => $reviewer2->id,
            'product_id' => $p1->id,
            'rating' => 4,
            'comment' => 'Great fabric, though shipping to Accra took a few days longer than expected.',
        ]);

        // Reviews for Cocoa Beans
        \App\Models\Review::create([
            'user_id' => $reviewer3->id,
            'product_id' => $p2->id,
            'rating' => 5,
            'comment' => 'The aroma is incredible. These beans make the best chocolate in Cairo!',
        ]);

        // Seed one Wishlist item for Admin
        \App\Models\Wishlist::updateOrCreate([
            'user_id' => $admin->id,
            'product_id' => $p1->id,
        ]);

        // Seed one Order for Admin
        \App\Models\Order::updateOrCreate([
            'user_id' => $admin->id,
            'team_id' => $team2->id,
        ], [
            'total_amount' => 1200.00,
            'status' => 'authorized',
            'shipping_status' => 'shipped',
        ]);
    }
}
