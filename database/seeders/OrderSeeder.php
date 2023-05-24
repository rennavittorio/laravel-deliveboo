<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order; //Order
use App\Models\Dish; //Dish
use Faker\Generator as Faker; //Faker
use Illuminate\Support\Facades\DB; //DB

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //Ordini
        $orders = [
            [
                'dishes' => [
                    [
                        'id' => 1,
                        'quantity' => 2
                    ]
                ],
                'total' => 10.00,
                'status' => 1,
                'first_name' => 'Mauro',
                'last_name' => 'Formisano',
                'email' => 'mauro@gmail.com',
                'phone' => $faker->randomNumber(9, true),
                'address' => 'Corso Unità d\'Italia, 40, Torino TO',
                'postal_code' => '10126'
            ],
            [
                'dishes' => [
                    [
                        'id' => 3,
                        'quantity' => 1
                    ]
                ],
                'total' => 6.00,
                'status' => 0,
                'first_name' => 'Giuliano',
                'last_name' => 'Gostinfini',
                'email' => 'giuliano@gmail.com',
                'phone' => $faker->randomNumber(9, true),
                'address' => 'Via Filadelfia, 96/b, Torino TO',
                'postal_code' => '10134'
            ],
            [
                'dishes' => [
                    [
                        'id' => 5,
                        'quantity' => 1
                    ],
                    [
                        'id' => 6,
                        'quantity' => 1
                    ]
                ],
                'total' => 18.50,
                'status' => 0,
                'first_name' => 'Adriano',
                'last_name' => 'Grimaldi',
                'email' => 'adriano@gmail.com',
                'phone' => $faker->randomNumber(9, true),
                'address' => 'Via Accademia delle Scienze, 6, Torino TO',
                'postal_code' => '10123'
            ],
            [
                'dishes' => [
                    [
                        'id' => 8,
                        'quantity' => 2
                    ]
                ],
                'total' => 16.00,
                'status' => 1,
                'first_name' => 'Gialuca',
                'last_name' => 'Lomarco',
                'email' => 'gianluca@gmail.com',
                'phone' => $faker->randomNumber(9, true),
                'address' => 'P.za Castello, Torino TO',
                'postal_code' => '10122'
            ],
            [
                'dishes' => [
                    [
                        'id' => 9,
                        'quantity' => 3
                    ],
                    [
                        'id' => 10,
                        'quantity' => 2
                    ]
                ],
                'total' => 25.50,
                'status' => 1,
                'first_name' => 'Giuseppe',
                'last_name' => 'Funicello',
                'email' => 'giuseppe@gmail.com',
                'phone' => $faker->randomNumber(9, true),
                'address' => 'Via Montebello, 20, Torino TO',
                'postal_code' => '10124'
            ],
        ];
        //Ciclo
        foreach ($orders as $order) {
            $newOrder = new Order(); //nuovo ordine
            $newOrder->total = $order['total']; //totale dell'ordine
            $newOrder->status = $order['status']; //stato del pagamento
            $newOrder->first_name = $order['first_name']; //nome del cliente
            $newOrder->last_name = $order['last_name']; //cognome del cliente
            $newOrder->email = $order['email']; //email del cliente
            $newOrder->phone = $order['phone']; //numero di telefono del cliente
            $newOrder->address = $order['address']; //indirizzo del cliente
            $newOrder->postal_code = $order['postal_code']; //codice postale del cliente
            $newOrder->save(); //invio i dati dal database
            //Ciclo
            foreach ($order['dishes'] as $dish) {
                //Inserisco i dati nella tabella ponte tra gli ordini e i piatti
                DB::table('dish_order')->insert([
                    'dish_id' => $dish['id'], //id del piatto
                    'order_id' => $newOrder->id, //id dell'ordine
                    'quantity' => $dish['quantity'] //quantità del piatto ordinato
                ]);
            }
        }
    }
}
