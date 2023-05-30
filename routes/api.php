<?php

use App\Http\Controllers\Api\OrderController; //ordine
use Illuminate\Http\Request;
use App\Http\Controllers\Api\RestaurantController; //ristorante
use App\Http\Controllers\Api\LeadController; //lead
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Ristorante
Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::get('/restaurants/{slug}', [RestaurantController::class, 'show']);

//Pagamento
Route::post('/order/pay', [OrderController::class, 'store']);

//Mail
Route::post('/leads', [LeadController::class, 'store']);