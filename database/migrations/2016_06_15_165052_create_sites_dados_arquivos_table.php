<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesDadosArquivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitesdadosarquivos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idlicitacao');
            $table->string('urlarquivo');
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
        Schema::drop('sitesdadosarquivos');
    }
}
