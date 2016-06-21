<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesDadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitesdados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idsite');
            $table->string('unidade');
            $table->string('titulo');
            $table->string('objeto');
            $table->string('data_bertura');
            $table->string('situacao');
            $table->string('local_licitacao');
            $table->string('telefone');
            $table->string('telefone2');
            $table->timestamps('datatime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sitesdados');
    }
}
