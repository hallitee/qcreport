<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasuregrpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measuregrps', function (Blueprint $table) {
            $table->increments('id');
			$table->string("name");
			$table->string("props")->nullable();
			$table->string("units")->nullable();
			$table->string("method")->nullable();
			$table->string("target")->nullable();
			$table->string("coa")->nullable();
			$table->string('metric1')->nullable();
			$table->string('metric2')->nullable();
			$table->integer('metric3')->nullable();
			$table->integer('metric4')->nullable();				
			$table->integer('mat_id')->unsigned();
			$table->foreign('mat_id')->references('id')->on('dbo.matgroups')->onDelete('cascade');			
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
        Schema::dropIfExists('measuregrps');
    }
}
