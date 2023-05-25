<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //Ristoranti
        $restaurants = [
            [
                'name' => 'Pizzeria Catullo',
                'user_id' => 1,
                'img' => 'catullo.png',
                'slug' => Str::slug('Pizzeria Catullo' . '-' . 'Corso Moncalieri, 176, 10133 Torino TO'),
                'address' => 'Corso Moncalieri, 176, 10133 Torino TO',
                'vat' => $faker->bothify('#######-###-#'),
                'category_ids' => [1, 9, 10, 11, 12]
            ],
            [
                'name' => 'Miyo Sushi',
                'user_id' => 2,
                'img' => 'miyo.png',
                'slug' => Str::slug('Miyo Sushi' . '-' . 'Via Paolo Sacchi, 63, 10125 Torino TO'),
                'address' => 'Via Paolo Sacchi, 63, 10125 Torino TO',
                'vat' => $faker->bothify('#######-###-#'),
                'category_ids' => [4, 9, 12]
            ],
            [
                'name' => 'La Taba',
                'user_id' => 3,
                'img' => 'la_taba.png',
                'slug' => Str::slug('La Taba' . '-' . 'Via dei Quartieri, 2, 10122 Torino TO'),
                'address' => 'Via dei Quartieri, 2, 10122 Torino TO',
                'vat' => $faker->bothify('#######-###-#'),
                'category_ids' => [7, 10]
            ],
            [
                'name' => 'Fondoo',
                'user_id' => 4,
                'img' => 'fondoo.jpg',
                'slug' => Str::slug('Fondoo' . '-' . 'Via Maria Vittoria, 11/L, 10123 Torino TO'),
                'address' => 'Via Maria Vittoria, 11/L, 10123 Torino TO',
                'vat' => $faker->bothify('#######-###-#'),
                'category_ids' => [2, 10]
            ],
            [
                'name' => 'Zheng Yang',
                'user_id' => 5,
                'img' => 'zheng_yang.png',
                'slug' => Str::slug('Zheng Yang' . '-' . 'Via Principi d\'Acaja, 61, 10100 Torino TO'),
                'address' => 'Via Principi d\'Acaja, 61, 10100 Torino TO',
                'vat' => $faker->bothify('#######-###-#'),
                'category_ids' => [3, 9, 10]
            ],
            [
                'name' => 'Plin & Tajarin',
                'user_id' => 6,
                'img' => 'plin_e_tajarin.png',
                'slug' => Str::slug('Plin & Tajarin' . '-' . 'Via Goffredo Casalis, 10138 Torino TO'),
                'address' => 'Via Goffredo Casalis, 10138 Torino TO',
                'vat' => $faker->bothify('#######-###-#'),
                'category_ids' => [1, 9, 13]
            ],
            [
                'name' => 'Bomaki',
                'user_id' => 7,
                'img' => 'bomaki.svg',
                'slug' => Str::slug('Bomaki' . '-' . 'Murazzi del Po Gipo Farassino, 23, 10123 Torino TO'),
                'address' => 'Murazzi del Po Gipo Farassino, 23, 10123 Torino TO',
                'vat' => $faker->bothify('#######-###-#'),
                'category_ids' => [4, 9, 12]
            ],
            [
                'name' => 'Mr Shawarma',
                'user_id' => 8,
                'img' => 'mr_shawarma.jpg',
                'slug' => Str::slug('Mr Shawarma' . '-' . 'Via Gambasca, 4F, 10138 Torino TO'),
                'address' => 'Via Gambasca, 4F, 10138 Torino TO',
                'vat' => $faker->bothify('#######-###-#'),
                'category_ids' => [10, 11, 14]
            ],
            [
                'name' => 'Jaipur',
                'user_id' => 9,
                'img' => 'jaipur.png',
                'slug' => Str::slug('Jaipur' . '-' . 'Corso Orbassano 230, 10137 Torino Italia'),
                'address' => 'Corso Orbassano 230, 10137 Torino Italia',
                'vat' => $faker->bothify('#######-###-#'),
                'category_ids' => [5, 9, 10]
            ],
            [
                'name' => 'Smith\'s British',
                'user_id' => 10,
                'img' => 'smiths_british.png',
                'slug' => Str::slug('Smith\'s British' . '-' . 'Via Virle, 19, 10138 Torino TO'),
                'address' => 'Via Virle, 19, 10138 Torino TO',
                'vat' => $faker->bothify('#######-###-#'),
                'category_ids' => [8, 10]
            ]
        ];
        //Ciclo
        foreach ($restaurants as $restaurant) {
            $newRestaurant = new Restaurant(); //creo un nuovo ristorante
            $newRestaurant->name = $restaurant['name']; //nome ristorante
            $newRestaurant->img = $restaurant['img']; //immagine del ristorante
            $newRestaurant->address = $restaurant['address']; //indirizzo del ristorante
            $newRestaurant->slug = $restaurant['slug']; //slug del ristorante
            $newRestaurant->vat =  $restaurant['vat']; //partita iva del ristorante
            $newRestaurant->user_id = $restaurant['user_id']; //id dell'utente
            $newRestaurant->save(); //salvo i dati nel database
            $newRestaurant->categories()->attach($restaurant['category_ids']); //associo la categoria al ristorante
            //pivot table seeding - attach 1/2 categories to restaurant
        }
    }
}
