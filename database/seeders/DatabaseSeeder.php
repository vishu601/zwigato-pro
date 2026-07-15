<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Purane items ko delete karo taaki duplicate na ho
        Item::truncate();

        // 2. Default Dynamic Food Items Add Karo
        Item::create([
            'name' => 'Classic Cheese Burger',
            'description' => 'Juicy veg patty loaded with melted cheese and fresh sauces.',
            'price' => 129,
            'emoji' => '🍔'
        ]);

        Item::create([
            'name' => 'Double Cheese Pizza',
            'description' => 'Fresh hand-tossed base loaded with extra mozzarella cheese.',
            'price' => 249,
            'emoji' => '🍕'
        ]);

        Item::create([
            'name' => 'Peri Peri French Fries',
            'description' => 'Crispy golden fries tossed in hot and spicy peri-peri mix.',
            'price' => 99,
            'emoji' => '🍟'
        ]);
    }
}
