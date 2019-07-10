<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->default('');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->tinyInteger('side')->default(1);
            $table->tinyInteger('position')->default(1);
            $table->tinyInteger('priority')->default(1);
            $table->tinyInteger('status')->default(0);
            $table->string('type')->default(1);
            $table->string('select')->nullable();
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
        Schema::dropIfExists('banners');
    }
}
