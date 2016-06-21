<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class FkTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sitesdados', function ($table){
        	$table->foreign('idsite')->references('id')->on('sites');
        });
        
        Schema::table('sitesdadosarquivos', function ($table){
	        $table->foreign('idlicitacao')->references('id')->on('sitesdados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
