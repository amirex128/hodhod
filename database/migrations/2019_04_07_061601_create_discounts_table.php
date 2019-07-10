<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('code')->nullable();
            $table->integer('price')->nullable();
            $table->integer('type')->nullable();
            $table->integer('max_user')->nullable();
            $table->integer('max_price')->nullable();
            $table->integer('min_price')->nullable();
            $table->text('users')->nullable();
            $table->text('categories')->nullable();
            $table->date('expire')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
    }
}
