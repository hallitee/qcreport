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
			$table->string('supplier')->nullable();
			$table->date('prodDate')->nullable();
			$table->date('expDate')->nullable();
			$table->date('arrDate')->nullable();	
			$table->date('samDate')->nullable()					
			$table->string('batch')->nullable();
			$table->string('poNum')->nullable();
			$table->string('waybill')->nullable();
			$table->string('quantity')->unsigned();
			$table->string('analysed')->nullable();
			$table->string('supervised')->unsigned();			
			$table->string('approved')->unsigned();	
			$table->string('coa')->unsigned();				
			
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
