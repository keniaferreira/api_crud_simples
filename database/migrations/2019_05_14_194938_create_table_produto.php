<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome',80);
            $table->float('preco',10,2);
            $table->string('descricao',250);
            $table->string('fabricante')->nullable(true);
            $table->string('slug',40);
            $table->integer('estoque');
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
        Schema::dropIfExists('produto');
    }
}
