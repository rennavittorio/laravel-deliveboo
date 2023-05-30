<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {

        $newOrder = new Order();
        $newOrder->total = $request->totalCart;
        $newOrder->status = '0'; //stato del pagamento
        $newOrder->first_name = $request->form['firstName'];
        $newOrder->last_name = $request->form['lastName'];
        $newOrder->email = $request->form['email'];
        $newOrder->phone = $request->form['phone'];
        $newOrder->address = $request->form['address'];
        $newOrder->postal_code = $request->form['postalCode'];
        $newOrder->save();

        foreach ($request->cart as $dish) {
            DB::table('dish_order')->insert([
                'dish_id' => $dish['id'],
                'order_id' => $newOrder->id,
                'quantity' => $dish['quantity']
            ]);
        }

        return response()->json([
            'success' => true,
            'results' => $request->all()
        ]);
    }
}
