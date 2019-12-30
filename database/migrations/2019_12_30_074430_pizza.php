<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizzas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome')->unique();
            $table->string('tamanho');
            $table->string('sabor');
            $table->timestamps();
        });

        Schema::create('vendas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('telefone');
            $table->string('endereco');
            $table->string('preco');
            $table->bigInteger('pizza_id')->references('id')->on('pizzas');;
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

        Schema::dropIfExists('orders');
    }
}
