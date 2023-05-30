<?php

use App\Http\Controllers\DishController; //piatti
use App\Http\Controllers\OrderController; //ordini
// use Illuminate\Http\Request; //request
// use App\Models\Order; //model
// use Illuminate\Support\Facades\DB; //DB
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
        return view('welcome', compact('restaurant', 'total_dishes', 'total_dishes_visible', 'total_orders', 'total_orders_paid')); //li mando a 'welcome'
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

//Hosted
/*Route::get('/hosted', function () {
    //Gateway
    $gateway = new Braintree\Gateway([
        'environment' => getenv('BT_ENVIRONMENT'),
        'merchantId' => getenv('BT_MERCHANT_ID'),
        'publicKey' => getenv('BT_PUBLIC_KEY'),
        'privateKey' => getenv('BT_PRIVATE_KEY')
    ]);
    $token = $gateway->ClientToken()->generate(); //token
    return view('hosted', [
        'token' => $token, //token
    ]);
});*/

//Braintree Checkout
/*Route::post("/checkout", function(Request $request) {
    //Gateway
    $gateway = new Braintree\Gateway([
        'environment' => getenv('BT_ENVIRONMENT'),
        'merchantId' => getenv('BT_MERCHANT_ID'),
        'publicKey' => getenv('BT_PUBLIC_KEY'),
        'privateKey' => getenv('BT_PRIVATE_KEY')
    ]);

    $amount = 0; //prezzo finale

    //Piatti fake
    $dishes = [
        [
            'id' => 1,
            'price' => 5,
            'quantity' => 2
        ],[
            'id' => 2,
            'price' => 7,
            'quantity' => 2
        ]
    ];

    //Calcolo il prezzo finale
    foreach ($dishes as $dish) {
        $amount += $dish['price'] * $dish['quantity'];
    }

    
    $nonce = $request->payment_method_nonce; //nonce
    $firstName = $request->first_name; //nome
    $lastName = $request->last_name; //cognome
    $email = $request->email; //email
    $phone = $request->phone; //telefono
    $address = $request->address; //indirizzo
    $postalCode = $request->postal_code; //codice postale

    $newOrder = new Order(); //nuovo ordine
    $newOrder->total = $amount; //prezzo totale dell'ordine
    $newOrder->status = 0; //stato del pagamento dell'ordine
    $newOrder->first_name = $firstName; //nome del cliente
    $newOrder->last_name = $lastName; //cognome del cliente
    $newOrder->email = $email; //email del cliente
    $newOrder->phone = $phone; //telefono del cliente
    $newOrder->address = $address; //indirizzo del cliente
    $newOrder->postal_code = $postalCode; //codice postale del cliente
    $newOrder->save(); //salvo i dati nel database

    //Inserisco i dati nella tabella ponte tra gli ordini e i piatti
    foreach ($dishes as $dish) {
        //Inserimento nel database
        DB::table('dish_order')->insert([
            'dish_id' => $dish['id'], //id del piatto
            'order_id' => $newOrder->id, //id dell'ordine
            'quantity' => $dish['quantity'] //quantità del piatto ordinato
        ]);
    }

    $result = $gateway->transaction()->sale([
        'amount' => $amount, //quantità
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
    
    if ($result->success) {
        $transaction = $result->transaction;
        $newOrder->status = 1; //cambio la stato dell'ordine in successo
        $newOrder->save(); //invio le informazio al database
        //header("Location: " . $baseUrl . "transaction.php?id=" . $transaction->id);
        return back()->with('success_message', 'Transaction successful. The ID is: ' . $transaction->id);
    } else {
        $errorString = "";
    
        foreach($result->errors->deepAll() as $error) {
            $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
        }
    
        //$_SESSION["errors"] = $errorString;
        //header("Location: " . $baseUrl . "index.php");
        return back()->withErrors('An error occurred with the message: ' . $result->message);
    }
});*/

require __DIR__ . '/auth.php';
