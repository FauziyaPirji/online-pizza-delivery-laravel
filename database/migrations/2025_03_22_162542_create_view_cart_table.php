<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('view_cart', function (Blueprint $table) {
            $table->id('cartItemId');                      
            $table->unsignedBigInteger('pizzaId');         
            $table->bigInteger('itemQuantity');            
            $table->unsignedBigInteger('userId'); 
            $table->timestamps();

            $table->foreign('pizzaId')->references('pizzaId')->on('pizzas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('view_cart');
    }
}
