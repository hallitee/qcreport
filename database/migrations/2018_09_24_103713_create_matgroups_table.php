<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatgroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matgroups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
			$table->string('qcSuper')->nullable();
			$table->string('qcSuperEmail')->nullable();	
			$table->string('qcMan')->nullable();
			$table->string('qcManEmail')->nullable();	
			$table->string('metric1')->nullable();
			$table->string('metric2')->nullable();
			$table->integer('metric3')->nullable();
			$table->integer('metric4')->nullable();				
			$table->integer('entity_id')->unsigned();
			$table->foreign('entity_id')->references('id')->on('dbo.entities')->onDelete('cascade');			
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
        Schema::dropIfExists('matgroups');
    }
}
