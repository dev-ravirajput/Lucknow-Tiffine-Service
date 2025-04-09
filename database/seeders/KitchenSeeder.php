<?php

// database/seeders/KitchenSeeder.php
namespace Database\Seeders;

use App\Models\Kitchen;
use Illuminate\Database\Seeder;

class KitchenSeeder extends Seeder
{
    public function run()
    {
        // Create additional random kitchens
        Kitchen::factory()->count(10)->create();
    }
}