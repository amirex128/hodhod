<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('brand_id')->unsigned()->nullable();
            $table->string('title')->default('');
            $table->text('description')->nullable();
            $table->text('body')->nullable();
            $table->text('video')->nullable();
            $table->string('code')->default('');
            $table->string('related')->default('');
            $table->integer('stock')->default(0);
            $table->integer('price')->default(0);
            $table->integer('offer')->default(0);
            $table->string('image')->default('');
            $table->text('gallery')->nullable();
            $table->tinyInteger('special')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('situation')->default(0);
            $table->integer('view_count')->default(0);
            $table->integer('order_count')->default(0);
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
        Schema::dropIfExists('products');
    }
}
