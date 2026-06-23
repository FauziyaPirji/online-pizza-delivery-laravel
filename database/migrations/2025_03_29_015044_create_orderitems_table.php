<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderitems', function (Blueprint $table) {
            $table->id();                                    // Auto-increment ID
            $table->unsignedBigInteger('orderId');           // FK to orders table
            $table->unsignedBigInteger('pizzaId');           // FK to pizza table
            $table->bigInteger('itemQuantity');              // Item quantity
            $table->timestamps();                            // Created_at & Updated_at

            // Foreign key constraints
            $table->foreign('orderId')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('pizzaId')->references('id')->on('pizza')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderitems');
    }
}
