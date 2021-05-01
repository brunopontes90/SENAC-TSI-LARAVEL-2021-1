<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaTabelaProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Produto', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('produto_id')->unsigned();
            $table->bigInteger('funcionario_id')->unsigned();
            $table->string('desc');
            $table->double('preco');
            $table->foreign('funcionario_id')->references('id')->on('Funcionario')->onDelete('cascade');
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });

    }


    public function down()
    {
        //
    }
}
