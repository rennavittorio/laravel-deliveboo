<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->id(); //id
            $table->string('name'); //nome
            $table->string('img'); //immagine
            $table->text('description'); //descrizione
            $table->double('price', 5, 2); //prezzo
            $table->boolean('is_visible'); //visibilità
            $table->timestamps(); //data di creazione e di modifica
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dishes');
    }
};
