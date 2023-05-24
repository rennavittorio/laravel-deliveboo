<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index() {
        if (request()->has('categories')) {
            $restaurants = Restaurant::join('category_restaurant', 'restaurants.id', '=', 'category_restaurant.restaurant_id')
                                        ->join('categories', 'categories.id', '=', 'category_restaurant.category_id')
                                        ->whereIn('categories.id', request()->query('categories'))
                                        ->distinct()
                                        ->with('dishes', 'categories')
                                        ->get('restaurants.*');
        } else {
            $restaurants = Restaurant::with('categories')->limit(20)->get();
        }
        $restaurants = Restaurant::with('categories')->limit(20)->get();
        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }

    public function show($slug) {

        $restaurant = Restaurant::where('slug', $slug)->with('dishes', 'categories')->first();

        if($restaurant) {
            return response()->json([
                'success' => true,
                'results' => $restaurant,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Non ci sono ristoranti con questo nome',
            ]);
        }
    }
}
