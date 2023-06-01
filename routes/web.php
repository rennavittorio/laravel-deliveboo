<?php

use App\Http\Controllers\DishController; //piatti
use App\Http\Controllers\OrderController; //ordini
use App\Http\Controllers\ProfileController;
use App\Models\Dish;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (Auth::user()) { //controllo se user è loggato, altrimenti rimanda errore al logout
        $restaurant = Restaurant::where('user_id', Auth::user()->id)->first(); //prendo i dati

        $total_dishes = Dish::where('restaurant_id', $restaurant->id)->count();
        $total_dishes_visible = Dish::where('restaurant_id', $restaurant->id)->where('is_visible', 1)->count();

        $total_orders = Order::join('dish_order', 'orders.id', '=', 'dish_order.order_id')
            ->join('dishes', 'dishes.id', '=', 'dish_order.dish_id')
            ->join('restaurants', 'restaurants.id', '=', 'dishes.restaurant_id')
            ->where('dishes.restaurant_id', '=', $restaurant->id)
            ->distinct()
            ->count('orders.id'); //prendo gli ordini collegati al ristorante dell'utente
        $total_orders_paid = Order::join('dish_order', 'orders.id', '=', 'dish_order.order_id')
            ->join('dishes', 'dishes.id', '=', 'dish_order.dish_id')
            ->join('restaurants', 'restaurants.id', '=', 'dishes.restaurant_id')
            ->where('dishes.restaurant_id', '=', $restaurant->id)->where('status', 1)
            ->distinct()
            ->count('orders.id'); //prendo gli ordini collegati al ristorante dell'utente  

        $total_dishes_not_visible = $total_dishes - $total_dishes_visible;
        $total_orders_not_paid = $total_orders - $total_orders_paid;
        return view('welcome', compact('restaurant', 'total_dishes', 'total_dishes_visible', 'total_dishes_not_visible', 'total_orders', 'total_orders_paid', 'total_orders_not_paid')); //li mando a 'welcome'
    }

    return redirect('http://localhost:5174/'); //redirect to frontend
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Piatti
Route::resource('dishes', DishController::class);

//Ordini
Route::resource('orders', OrderController::class);

require __DIR__ . '/auth.php';
