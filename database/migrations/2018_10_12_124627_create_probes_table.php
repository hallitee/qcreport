<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProbesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('probes', function (Blueprint $table) {
            $table->increments('id');
			$table->string('prop');
			$table->string('unit')->nullable();
			$table->string('method');
			$table->string('tarType');	
			$table->string('tarRem')->nullable();		
			$table->string('tarName')->nullable();				
			$table->string('low')->nullable();
			$table->string('high')->nullable();
			$table->integer('iLow')->nullable();
			$table->integer('iHigh')->nullable();			
			$table->string('error')->nullable();			
			$table->integer('measuregrps_id')->unsigned();			
			$table->foreign('measuregrps_id')->references('id')->on('measuregrps')->onDelete('cascade');			
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
        Schema::dropIfExists('probes');
    }
}
