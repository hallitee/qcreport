<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samples', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('coa')->nullable();			
			$table->string('data1')->nullable();
			$table->string('data2')->nullable();	
			$table->string('data3')->nullable();
			$table->string('data4')->nullable();
			$table->string('data5')->nullable();
			$table->string('data6')->nullable();	
			$table->string('data7')->nullable();
			$table->string('data8')->nullable();	
			$table->string('data9')->nullable();
			$table->string('data10')->nullable();	
			$table->string('metric1')->nullable();
			$table->string('metric2')->nullable();
			$table->integer('metric3')->nullable();
			$table->integer('metric4')->nullable();			
			$table->integer('qcpass_id')->unsigned();			
			$table->foreign('qcpass_id')->references('id')->on('qcpasses')->onDelete('cascade');			
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
        Schema::dropIfExists('samples');
    }
}
