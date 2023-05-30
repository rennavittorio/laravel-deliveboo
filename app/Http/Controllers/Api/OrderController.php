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

        $amount = 0; //prezzo finale

        //Calcolo il prezzo finale
        foreach ($request->cart as $dish) {
            $amount += $dish['price'] * $dish['quantity'];
        }

        $newOrder = new Order(); //nuovo ordine
        $newOrder->total = $amount; //prezzo finale dell'ordine
        $newOrder->status = 0; //stato del pagamento
        $newOrder->first_name = $request->form['firstName']; //nome del cliente
        $newOrder->last_name = $request->form['lastName']; //cognome del cliente
        $newOrder->email = $request->form['email']; //email del cliente
        $newOrder->phone = $request->form['phone']; //telefono del cliente
        $newOrder->address = $request->form['address']; //indirizzo del cliente
        $newOrder->postal_code = $request->form['postalCode']; //codice postale del cliente
        $newOrder->save(); //invio i dati dal database
        
        //Inserisco i dati nella tabella ponte tra gli ordini e i piatti
        foreach ($request->cart as $dish) {
            //Inserimento nel database
            DB::table('dish_order')->insert([
                'dish_id' => $dish['id'], //id del piatto
                'order_id' => $newOrder->id, //id dell'ordine
                'quantity' => $dish['quantity'] //quantità del piatto ordinato
            ]);
        }

        return response()->json([
            'success' => true,
            'results' => $request->all()
        ]);
    }
}
