<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizzas', function (Blueprint $table) {
            $table->id('pizzaId');
            $table->string('pizzaName', 21)->unique();
            $table->integer('pizzaPrice');
            $table->text('pizzaDesc');
            $table->foreignId('pizzaCategorieId')->constrained('categories')->onDelete('cascade');
            $table->string('pizzaPhoto', 100)->nullable();
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
        Schema::dropIfExists('pizzas');
    }
}
