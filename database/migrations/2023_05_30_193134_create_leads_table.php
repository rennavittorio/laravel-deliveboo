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
        Schema::create('leads', function (Blueprint $table) {
            $table->id(); //id
            $table->string('name'); //nome dell'utente che contatta
            $table->string('email'); //email dell'utente che contatta
            $table->text('message'); //messaggio dell'utente che contatta
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
        Schema::dropIfExists('leads');
    }
};
