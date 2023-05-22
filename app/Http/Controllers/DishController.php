<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $dishes = Dish::where('restaurant_id', $user->id)->get(); //controlliamo scarico dishes solo per user registrato
        return view('dishes.index', compact('dishes', 'user')); //restituisco la vista index
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('dishes.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDishRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDishRequest $request)
    {
        $user = Auth::user();
        $data = $request->validated(); //valido i dati inseriti

        //serve per permettere l'upload di un'img da locale per l'user
        if ($request->hasFile('img')) {
            $cover_path = Storage::put('uploads', $data['img']);
            $data['img'] = $cover_path; //riempiamo il campo che abbiamo già
        };

        $data['restaurant_id'] = $user->id;
        $newDish = Dish::create($data); //creo un nuovo piatto
        return to_route('dishes.index'); //torno alla rotta index
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('dishes.show', compact('dish')); //restituisco la vista show (non utilizzata per ora)
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $user = Auth::user();
        return view('dishes.edit', compact('user', 'dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDishRequest  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {
        $data = $request->validated(); //valido i dati inseriti
        $dish::update($data); //aggiorno i dati del piatto
        return to_route('dishes.index', $dish); //torno alla rotta index
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete(); //elimino il piatto
        return to_route('dishes.index'); //torno alla rotta index
    }
}
