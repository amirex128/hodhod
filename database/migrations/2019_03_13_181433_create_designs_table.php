<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->default('');
            $table->timestamps();
            $table->softDeletes();

        });
	
	    Schema::create('design_product', function (Blueprint $table) {
		    $table->bigIncrements('id');
		    $table->integer('product_id');
		    $table->integer('design_id');
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
        Schema::dropIfExists('designs');
        Schema::dropIfExists('design_product');
    }
}
