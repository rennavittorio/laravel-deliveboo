<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish; //model
use App\Models\Restaurant; //model
use Faker\Generator as Faker; //faker

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //Piatti
        $dishes = [
            [
                'name' => 'Pizza Margherita',
                'img' => 'pizza_margherita.jpg',
                'description' => 'Pizza classica',
                'price' => 5.00,
                'is_visible' => 1,
                'restaurant_id' => 1
            ],
            [
                'name' => 'Polpo con patate',
                'img' => 'polpo_con_patate.jpg',
                'description' => 'Polpo con le patate',
                'price' => 7.00,
                'is_visible' => 1,
                'restaurant_id' => 1
            ],
            [
                'name' => 'Nigiri al salmone',
                'img' => 'nigiri_al_salmone.png',
                'description' => 'Nigiri al salmone',
                'price' => 6.00,
                'is_visible' => 1,
                'restaurant_id' => 2
            ],
            [
                'name' => 'Ramen',
                'img' => 'ramen.png',
                'description' => 'Ramen con carne',
                'price' => 10.00,
                'is_visible' => 1,
                'restaurant_id' => 2
            ],
            [
                'name' => 'Empanadas',
                'img' => 'empanadas.png',
                'description' => 'Empanadas di carne',
                'price' => 6.50,
                'is_visible' => 1,
                'restaurant_id' => 3
            ],
            [
                'name' => 'Carne con patate',
                'img' => 'carne_con_patate.jpg',
                'description' => 'Carne con contorno di patate',
                'price' => 12.00,
                'is_visible' => 1,
                'restaurant_id' => 3
            ],
            [
                'name' => 'Escargot',
                'img' => 'escargot.png',
                'description' => 'Lumache',
                'price' => 4.00,
                'is_visible' => 1,
                'restaurant_id' => 4
            ],
            [
                'name' => 'Omelette',
                'img' => 'omelette.png',
                'description' => 'Omelette',
                'price' => 6.50,
                'is_visible' => 1,
                'restaurant_id' => 4
            ],
            [
                'name' => 'Gyoza',
                'img' => 'gyoza.jpg',
                'description' => 'Ravioli di carne',
                'price' => 4.50,
                'is_visible' => 1,
                'restaurant_id' => 5
            ],
            [
                'name' => 'Riso alla cantonese',
                'img' => 'riso_alla_cantonese.png',
                'description' => 'Riso alla cantonese',
                'price' => 6,
                'is_visible' => 1,
                'restaurant_id' => 5
            ],
            [
                'name' => 'Plin di carne e zucca al sugo d’arrosto e amaretto',
                'img' => 'plin.jpg',
                'description' => 'Plin di carne e zucca al sugo d’arrosto e amaretto',
                'price' => 15,
                'is_visible' => 1,
                'restaurant_id' => 6
            ],
            [
                'name' => 'Tajarin burro e salvia',
                'img' => 'tajarin.jpg',
                'description' => 'Tajarin con burro e salvia',
                'price' => 15,
                'is_visible' => 1,
                'restaurant_id' => 6
            ],
            [
                'name' => 'Special Box 32pz',
                'img' => 'special_box.jpg',
                'description' => '(2 uramaki special, 2 uramaki regular) Astice gratinato al mango, Carnaval, tonno e pistacchio, salmone alla fiamma',
                'price' => 60,
                'is_visible' => 1,
                'restaurant_id' => 7
            ],
            [
                'name' => 'Mix Box 32pz',
                'img' => 'mix_box.jpg',
                'description' => '(1 uramaki special, 3 uramaki regular) Sweet & sour salmon, Astice gratinato, Dragon Messicano, Extra spicy tonno',
                'price' => 50,
                'is_visible' => 1,
                'restaurant_id' => 7
            ],
            [
                'name' => 'Kebab',
                'img' => 'kebab.jpg',
                'description' => 'Kebab',
                'price' => 5.50,
                'is_visible' => 1,
                'restaurant_id' => 8
            ],
            [
                'name' => 'Pizza Kebab',
                'img' => 'pizza_kebab.jpg',
                'description' => 'Pizza con il kebab',
                'price' => 7.50,
                'is_visible' => 1,
                'restaurant_id' => 8
            ],
            [
                'name' => 'Cheese Naan',
                'img' => 'cheese_naan.jpg',
                'description' => 'Il classico pane indiano di farina bianca ripieno di formaggio',
                'price' => 3.50,
                'is_visible' => 1,
                'restaurant_id' => 9
            ],
            [
                'name' => 'Fish Pakora',
                'img' => 'fish_pakora.jpg',
                'description' => 'Bocconcini di pesce spada marinato con lime, zenzero fresco e spezie',
                'price' => 3.50,
                'is_visible' => 1,
                'restaurant_id' => 9
            ],
            [
                'name' => 'Steak Tartare',
                'img' => 'steak_tartare.jpg',
                'description' => 'Filetto di Angus Irlandese battuto al coltello & condito. Servito con maionese alla senape e tuorlo d\'uovo bio',
                'price' => 14.50,
                'is_visible' => 1,
                'restaurant_id' => 10
            ],
            [
                'name' => 'Fish & Chips',
                'img' => 'fish_and_chips.jpg',
                'description' => 'Filetto di merluzzo nella tradizionale pastella di birra rossa. Servito patate fritte.',
                'price' => 20,
                'is_visible' => 1,
                'restaurant_id' => 10
            ],
        ];
        //Ciclo
        foreach ($dishes as $dish) {
            $newDish = new Dish(); //nuovo piatto
            $newDish->name = $dish['name']; //nome del piatto
            $newDish->img = $dish['img']; //immagine del piatto
            $newDish->description = $dish['description']; //descrizione del piatto
            $newDish->price = $dish['price']; //prezzo del piatto
            $newDish->is_visible = $dish['is_visible']; //visibilità del piatto
            $newDish->restaurant_id = $dish['restaurant_id']; //id del ristorante
            $newDish->save(); //invio i dati al database
        }
    }
}
