<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('orderId');                           // UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->unsignedBigInteger('userId');            // REFERENCES `customer` (`id`)
            $table->string('address', 255);                  // VARCHAR(255) NOT NULL
            $table->bigInteger('zipCode');                   // BIGINT(20) NOT NULL
            $table->string('phoneNo', 15);                   // VARCHAR(15) NOT NULL
            $table->bigInteger('amount');                    // BIGINT(20) NOT NULL

            // ENUM for payment mode: 0 = cash delivery, 1 = online
            $table->enum('paymentMode', ['0', '1'])
                ->comment('0 = cash delivery, 1 = online');

            // ENUM for order status with comment
            $table->enum('orderStatus', ['0', '1', '2', '3', '4', '5', '6'])
                ->comment('0 = Order placed, 1 = Order confirmed, 2 = Preparing, 3 = On the way, 4 = Delivered, 5 = Denied, 6 = Cancelled');

            $table->dateTime('OrderDate');                   // DATETIME NOT NULL

            // Foreign key reference to customer table
            $table->foreign('userId')->references('id')->on('customer')->onDelete('cascade');

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
        Schema::dropIfExists('orders');
    }
}
