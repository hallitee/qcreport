<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQcpassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qcpasses', function (Blueprint $table) {
            $table->increments('id');
			$table->string('matName');			
			$table->string('supplier')->nullable();
			$table->date('prodDate')->nullable();
			$table->date('expDate')->nullable();
			$table->date('arrDate')->nullable();	
			$table->date('samDate')->nullable();	
			$table->string('coa')->nullable();	
			$table->string('sku')->nullable();				
			$table->string('batch')->nullable();
			$table->string('poNum')->nullable();
			$table->string('waybill')->nullable();
			$table->string('quantity')->nullable();
			$table->string('analysed')->nullable();
			$table->string('supervised')->nullable();			
			$table->string('approved')->nullable();	
			$table->string('vehNum')->nullable();				
			$table->string('metric1')->nullable();
			$table->string('metric2')->nullable();
			$table->integer('metric3')->nullable();
			$table->integer('metric4')->nullable();
			$table->integer('product_id')->unsigned();			
			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');				
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
        Schema::dropIfExists('qcpasses');
    }
}
