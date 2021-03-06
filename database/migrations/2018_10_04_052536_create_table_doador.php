<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDoador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doadors', function (Blueprint $table) {
            
            //Minhas colunas
            $table->increments('id');

            $table->date('data_nascimento')->nullable($value = false);

            $table->string('senha',100)->nullable($value = false);

            $table->string('cpf',20)->unique()->nullable($value = false);

            $table->string('nome',45)->nullable($value = false);

            $table->string('email',45)->nullable($value = false);

            $table->string('sobrenome',45);

            $table->string('sexo',10)->nullable($value = false);

            $table->string('cep',20);

            $table->string('image',30);

            $table->string('rua',45)->nullable($value = false);

            $table->string('cidade',45)->nullable($value = false);

            $table->string('bairro',45)->nullable($value = false);

            $table->integer('numero');

            $table->string('referencia',45);

            $table->string('tipo_sanguineo',45)->nullable($value = false);

            $table->string('profissao',45);

            $table->tinyInteger('quetionarioRespondido');



            //colunas padrão laravel
            $table->rememberToken(); // -> Usado para usuarios que precisam de autentitação
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
        Schema::dropIfExists('doadors');
    }
}
