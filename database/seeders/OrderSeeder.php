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
                        'id' => 1,
                        'quantity' => 3
                    ],
                    [
                        'id' => 2,
                        'quantity' => 2
                    ]
                ],
                'total' => 29.00,
                'status' => 1,
                'first_name' => 'Giuseppe',
                'last_name' => 'Funicello',
                'email' => 'giuseppe@gmail.com',
                'phone' => $faker->randomNumber(9, true),
                'address' => 'Via Montebello, 20, Torino TO',
                'postal_code' => '10124'
            ],
            [
                'dishes' => [
                    [
                        'id' => 1,
                        'quantity' => 1
                    ],
                    [
                        'id' => 2,
                        'quantity' => 1
                    ]
                ],
                'total' => 12.00,
                'status' => 1,
                'first_name' => 'Luigi',
                'last_name' => 'Micco',
                'email' => 'luigi@gmail.com',
                'phone' => $faker->randomNumber(9, true),
                'address' => 'Piazza Carducci, 169/173, Torino TO',
                'postal_code' => '10126'
            ],
            [
                'dishes' => [
                    [
                        'id' => 1,
                        'quantity' => 8
                    ],
                    [
                        'id' => 2,
                        'quantity' => 8
                    ]
                ],
                'total' => 96.00,
                'status' => 1,
                'first_name' => 'Gianluca',
                'last_name' => 'Lomarco',
                'email' => 'gianluca@gmail.com',
                'phone' => $faker->randomNumber(9, true),
                'address' => 'Piazza Carducci, 169/173, Torino TO',
                'postal_code' => '10126'
            ],
            [
                'dishes' => [
                    [
                        'id' => 1,
                        'quantity' => 5
                    ],
                ],
                'total' => 20.00,
                'status' => 1,
                'first_name' => 'Riccardo',
                'last_name' => 'Scrizzi',
                'email' => 'riccardo@gmail.com',
                'phone' => $faker->randomNumber(9, true),
                'address' => 'Corso Giambattista Beccaria, 4, Torino TO',
                'postal_code' => '10124'
            ],
            [
                'dishes' => [
                    [
                        'id' => 1,
                        'quantity' => 2
                    ],
                    [
                        'id' => 2,
                        'quantity' => 1
                    ]
                ],
                'total' => 17.00,
                'status' => 1,
                'first_name' => 'Emanuele',
                'last_name' => 'Paratore',
                'email' => 'emanuele@gmail.com',
                'phone' => $faker->randomNumber(9, true),
                'address' => 'Piazza Gran Madre di Dio, 4, Torino TO',
                'postal_code' => '10131'
            ],
            [
                'dishes' => [
                    [
                        'id' => 1,
                        'quantity' => 5
                    ],
                    [
                        'id' => 2,
                        'quantity' => 5
                    ]
                ],
                'total' => 60.00,
                'status' => 1,
                'first_name' => 'Leica',
                'last_name' => 'Florian',
                'email' => 'leica@gmail.com',
                'phone' => $faker->randomNumber(9, true),
                'address' => 'Corso Novara, 135, Torino TO',
                'postal_code' => '10153'
            ],
            [
                'dishes' => [
                    [
                        'id' => 1,
                        'quantity' => 10
                    ]
                ],
                'total' => 50.00,
                'status' => 1,
                'first_name' => 'Valentina',
                'last_name' => 'Ferrari',
                'email' => 'valentina@gmail.com',
                'phone' => $faker->randomNumber(9, true),
                'address' => 'Via Bologna, 32, Torino TO',
                'postal_code' => '10152'
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
                'status' => 1,
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
                'total' => 13.00,
                'status' => 0,
                'first_name' => 'Gianluca',
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
            [
                'dishes' => [
                    [
                        'id' => 11,
                        'quantity' => 2
                    ],
                    [
                        'id' => 12,
                        'quantity' => 2
                    ]
                ],
                'total' => 60,
                'status' => 1,
                'first_name' => 'Luigi',
                'last_name' => 'Micco',
                'email' => 'luigi@gmail.com',
                'phone' => $faker->randomNumber(9, true),
                'address' => 'Piazza Carducci, 169/173, Torino TO',
                'postal_code' => '10126'
            ],
            [
                'dishes' => [
                    [
                        'id' => 14,
                        'quantity' => 1
                    ]
                ],
                'total' => 50,
                'status' => 1,
                'first_name' => 'Riccardo',
                'last_name' => 'Scrizzi',
                'email' => 'riccardo@gmail.com',
                'phone' => $faker->randomNumber(9, true),
                'address' => 'Corso Giambattista Beccaria, 4, Torino TO',
                'postal_code' => '10122'
            ],
            [
                'dishes' => [
                    [
                        'id' => 15,
                        'quantity' => 2
                    ]
                ],
                'total' => 11,
                'status' => 0,
                'first_name' => 'Emanuele',
                'last_name' => 'Paratore',
                'email' => 'emanuele@gmail.com',
                'phone' => $faker->randomNumber(9, true),
                'address' => 'Piazza Gran Madre di Dio, 4, Torino TO',
                'postal_code' => '10131'
            ],
            [
                'dishes' => [
                    [
                        'id' => 17,
                        'quantity' => 1
                    ],
                    [
                        'id' => 18,
                        'quantity' => 2
                    ]
                ],
                'total' => 10.50,
                'status' => 0,
                'first_name' => 'Leica',
                'last_name' => 'Florian',
                'email' => 'leica@gmail.com',
                'phone' => $faker->randomNumber(9, true),
                'address' => 'Corso Novara, 135, Torino TO',
                'postal_code' => '10153'
            ],
            [
                'dishes' => [
                    [
                        'id' => 19,
                        'quantity' => 2
                    ],
                    [
                        'id' => 20,
                        'quantity' => 2
                    ]
                ],
                'total' => 69,
                'status' => 1,
                'first_name' => 'Valentina',
                'last_name' => 'Ferrari',
                'email' => 'valentina@gmail.com',
                'phone' => $faker->randomNumber(9, true),
                'address' => 'Via Bologna, 32, Torino TO',
                'postal_code' => '10152'
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
