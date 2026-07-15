<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Item;

// Guest Routes (Login / Register)
Route::get('/', function () {
    return view('index');
})->name('login');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Protected Dashboard Route (Login hone ke baad hi khulega)
// Protected Dashboard Route with Dynamic Database Items
Route::get('/dashboard', function () {
    $items = \App\Models\Item::all(); // Database se saare dynamic cards uthao
    return view('dashboard', compact('items'));
})->middleware('auth');




// Temporary Route to seed sample items
Route::get('/seed-items', function() {
    Item::create(['name' => 'Classic Cheese Burger', 'description' => 'Juicy veg patty loaded with melted cheese and fresh sauces.', 'price' => 129, 'emoji' => '🍔']);
    Item::create(['name' => 'Double Cheese Pizza', 'description' => 'Fresh hand-tossed base loaded with extra mozzarella cheese.', 'price' => 249, 'emoji' => '🍕']);
    Item::create(['name' => 'Peri Peri French Fries', 'description' => 'Crispy golden fries tossed in hot and spicy peri-peri mix.', 'price' => 99, 'emoji' => '🍟']);

    return "Success! 3 Dynamic Items Added to Database. Now delete or comment this route.";
});
