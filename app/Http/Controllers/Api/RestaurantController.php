<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index() {

        $restaurants = Restaurant::with('categories')->limit(20)->get();

        return response()->json([
            'success' => true,
            'results' => $restaurants,
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
