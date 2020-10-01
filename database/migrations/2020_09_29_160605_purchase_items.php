<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PurchaseItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('purchase_id')->comment('ID of the purchase');
            $table->unsignedBigInteger('pizza_id')->comment('ID of the pizza');
            $table->integer('quantity')->comment('Quantity of pizzas');
            $table->decimal('subtotal', 8, 2)->comment('Subtotal');
            $table->timestamps();
            $table->softDeletes();
        });

        //Add foreign keys and constraints
        Schema::table('purchase_items', function (Blueprint $table){
            $table->foreign('purchase_id')->references('id')->on('purchase');
            $table->foreign('pizza_id')->references('id')->on('pizza');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_items');
    }
}
