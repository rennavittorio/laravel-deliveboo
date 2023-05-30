<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Restaurant; //ristorante
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Facades\Auth; //auth
use Illuminate\Support\Facades\DB; //DB

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
        //Gateway
        $gateway = new \Braintree\Gateway([
            'environment' => getenv('BT_ENVIRONMENT'),
            'merchantId' => getenv('BT_MERCHANT_ID'),
            'publicKey' => getenv('BT_PUBLIC_KEY'),
            'privateKey' => getenv('BT_PRIVATE_KEY')
        ]);
        $token = $gateway->ClientToken()->generate(); //token
        // $order = Order::find(request()->query('order_id')); //cerco l'ordine
        // $total = $order->total; //prendo il prezzo del'ordine
        return view('orders.create', compact('token')); //restituisco la vista create
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {   
        //Gateway
        $gateway = new \Braintree\Gateway([
            'environment' => getenv('BT_ENVIRONMENT'),
            'merchantId' => getenv('BT_MERCHANT_ID'),
            'publicKey' => getenv('BT_PUBLIC_KEY'),
            'privateKey' => getenv('BT_PRIVATE_KEY')
        ]);

        $order = Order::find($request->order_id); //ordine
        $amount = $order->total; //prezzo finale
        
        $nonce = $request->payment_method_nonce; //nonce
        $firstName = $request->first_name; //nome
        $lastName = $request->last_name; //cognome
        $email = $request->email; //email
        $phone = $request->phone; //telefono
        $address = $request->address; //indirizzo
        $postalCode = $request->postal_code; //codice postale

        //Transazione
        $result = $gateway->transaction()->sale([
            'amount' => $amount, //prezzo finale
            'paymentMethodNonce' => $nonce,//nonce
            //Cliente
            'customer' => [
                'firstName' => $firstName, //nome
                'lastName' => $lastName, //cognome
                'email' => $email, //email
                'phone' => $phone, //telefono
            ],
            //Addebito
            'billing' => [
                'firstName' => $firstName, //nome
                'lastName' => $lastName, //cognome
                'streetAddress' => $address, //indirizzo
                'postalCode' => $postalCode, //codice postale
            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        //Se la transazione avviene con successo
        if ($result->success) {
            $transaction = $result->transaction;
            $order->status = 1; //cambio la stato dell'ordine in successo
            $order->save(); //invio le informazio al database
            //header("Location: " . $baseUrl . "transaction.php?id=" . $transaction->id);
            return back()->with('success_message', 'Transaction successful. The ID is: ' . $transaction->id);
        } else { //altrimenti
            $errorString = "";
            foreach($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }
            //$_SESSION["errors"] = $errorString;
            //header("Location: " . $baseUrl . "index.php");
            return back()->withErrors('An error occurred with the message: ' . $result->message);
        }
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
