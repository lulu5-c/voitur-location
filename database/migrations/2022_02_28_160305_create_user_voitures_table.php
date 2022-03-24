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
        Schema::create('user_voitures', function (Blueprint $table) {
            $table->id();
            $table->string('voiture_marque');
            $table->string('louer');
            $table->integer('nombre');
            $table->string('restituer')->nullable(); 
            $table->dateTime('dateLocation');
            $table->dateTime('dateRendu');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('voiture_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('voiture_id')->references('id')->on('voitures');
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
        Schema::dropIfExists('user_voitures');
    }
};
