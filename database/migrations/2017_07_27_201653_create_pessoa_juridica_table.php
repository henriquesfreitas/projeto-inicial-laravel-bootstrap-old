<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoaJuridicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_juridica', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razao_social'); //nome de registro da pessoa-juridica
            $table->string('nome_fantasia'); //nome comercial da pessoa-juridica
            $table->bigInteger('cnpj');
            $table->string('nome_pessoa_contato');
            $table->string('email');
            $table->bigInteger('telefone');
            $table->integer('cep');
            $table->string('logradouro');
            $table->string('numero');
            $table->string('bairro');
            $table->integer('id_cidade');
            $table->timestamps();
        });

        Schema::table('pessoa_juridica', function($table) {
            $table->foreign('id_cidade')->references('id')->on('cidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa_juridica');
    }
}
