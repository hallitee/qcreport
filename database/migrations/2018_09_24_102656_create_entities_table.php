<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entities', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string("fName")->nullable();
			$table->string('gmName')->nullable();
			$table->string('gmEmail')->nullable();
			$table->string('entitycode')->nullable();
			$table->string('cAddress')->nullable();			
			$table->string('metric1')->nullable();
			$table->string('metric2')->nullable();
			$table->integer('metric3')->nullable();
			$table->integer('metric4')->nullable();			
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
        Schema::dropIfExists('entities');
    }
}
