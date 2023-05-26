<?php

use App\Http\Controllers\DishController; //piatti
use App\Http\Controllers\OrderController; //ordini
use Illuminate\Http\Request; //request
use App\Models\Order; //model
use App\Http\Controllers\ProfileController;
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
        return view('welcome', compact('restaurant')); //li mando a 'welcome'
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
Route::get('/hosted', function () {
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
});

//Braintree Checkout
Route::post("/checkout", function(Request $request) {
    //Gateway
    $gateway = new Braintree\Gateway([
        'environment' => getenv('BT_ENVIRONMENT'),
        'merchantId' => getenv('BT_MERCHANT_ID'),
        'publicKey' => getenv('BT_PUBLIC_KEY'),
        'privateKey' => getenv('BT_PRIVATE_KEY')
    ]);

    $amount = $request->amount; //quantità
    $nonce = $request->payment_method_nonce; //nonce
    $firstName = isset($request->first_name) ? $request->first_name : "Mario"; //nome
    $lastName = isset($request->last_name) ? $request->last_name : "Rossi"; //cognome
    $email = isset($request->email) ? $request->email : "mariorossi@gmail.com"; //email
    $phone = isset($request->phone) ? $request->phone : "1234567890"; //telefono
    $address = isset($request->address) ? $request->address : "Via Genova 1"; //indirizzo
    $postalCode = isset($request->postalCode) ? $request->postalCode : "10100"; //codice postale

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
});

require __DIR__ . '/auth.php';
