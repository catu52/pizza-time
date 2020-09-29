<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PizzaIngredient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizza_ingredient', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pizza_id')->comment('ID of the pizza');
            $table->unsignedBigInteger('ingredient_id')->comment('ID of the ingredient');
            $table->timestamps();
            $table->softDeletes();
        });

        //Add foreign keys and constraints
        Schema::table('pizza_ingredient', function (Blueprint $table){
            $table->foreign('pizza_id')->references('id')->on('pizza');
            $table->foreign('ingredient_id')->references('id')->on('ingredient');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizza_ingredient');
    }
}
