<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        //Se vengono inserite anche le categorie
        if (request()->has('categories')) {
            //Effetto la ricerca sui ristoranti con le categorie desiderate
            $restaurants = Restaurant::join('category_restaurant', 'restaurants.id', '=', 'category_restaurant.restaurant_id')
                ->join('categories', 'categories.id', '=', 'category_restaurant.category_id')
                ->whereIn('categories.name', request()->query('categories'))
                ->groupBy('restaurants.id')
                ->havingRaw('COUNT(DISTINCT category_restaurant.category_id) = ?', [count(request()->query('categories'))])
                ->with('dishes', 'categories')
                ->get('restaurants.*');
        } else { //altrimenti
            $restaurants = Restaurant::with('dishes', 'categories')->limit(20)->get(); //prendo tutti i ristoranti dal database in paginati
        }
        //Invio la risposta JSON
        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }

    public function show($slug)
    {

        $restaurant = Restaurant::where('slug', $slug)->with('dishes', 'categories')->first();

        if ($restaurant) {
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

    //funzione che restituisce i dati al frontend
    public function payment(Request $request)
    {
        return response()->json([
            'success' => false,
            'results' => $request->all(),
        ]);
    }
}
