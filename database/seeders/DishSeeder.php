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
        $restaurant_ids = Restaurant::all()->pluck("id")->all(); //id dei ristoranti
        $order_ids = Restaurant::all()->pluck("id")->all(); //id dei ristoranti
        //Ciclo
        for ($i = 0; $i < 50; $i++) {
            $newDish = new Dish(); //nuovo piatto
            $newDish->name = $faker->word(); //nome
            $newDish->img = "https://picsum.photos/200"; //immagine
            $newDish->description = $faker->sentence(5); //descrizione
            $newDish->price = $faker->randomFloat(2, 20, 30);; //prezzo
            $newDish->is_visible = $faker->numberBetween(0, 1); //visibilità
            $newDish->restaurant_id = $faker->randomElement($restaurant_ids); //id del ristorante
            $newDish->save(); //invio i dati al database
            $newDish->orders()->attach($faker->randomElements($order_ids, 2)); //inserisco i dati nella tabella ponte
        }
    }
}
