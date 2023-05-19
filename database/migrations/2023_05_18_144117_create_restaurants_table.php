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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            //Francesco che testa i branch

            //modifica commento per conflitto

            //test-branch-vittorio

            //test lapo1
            $table->string('name', 100);
            $table->string('img', 255)->default('https://picsum.photos/200');
            $table->string('slug', 255)->unique();
            $table->string('address', 255);
            $table->string('vat', 11)->unique();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
};
