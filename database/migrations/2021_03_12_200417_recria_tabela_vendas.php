<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecriaTabelaVendas extends Migration
{
    public function up()
    {
        Schema::create('Vendas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cliente_id')->unsigned();
            $table->bigInteger('funcionario_id')->unsigned();
            $table->date('data_da_venda');
            $table->double('valor', 12, 2);
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('Clientes')->onDelete('cascade');
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

        });
    }

    public function down()
    {
        Schema::dropIfExists('Vendas');
    }
}
