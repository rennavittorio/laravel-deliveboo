<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Restaurant; //ristorante
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Facades\Auth; //auth

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user(); //utente
        $restaurant = Restaurant::find($user->id); //prendo il ristorante dell'utente
        $orders = Order::join('dish_order', 'orders.id', '=', 'dish_order.order_id')
                ->join('dishes', 'dishes.id', '=', 'dish_order.dish_id')
                ->join('restaurants', 'restaurants.id', '=', 'dishes.restaurant_id')
                ->where('dishes.restaurant_id', '=', $restaurant->id)
                ->orderBy('created_at', 'desc')
                ->distinct()
                ->get('orders.*'); //prendo gli ordini collegati al ristorante dell'utente
        return view('orders.index', compact('orders')); //restituisco la vista index
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order')); //restituisco la vista show
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
