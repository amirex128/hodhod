<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('original_name');
            $table->string('server_name');
            $table->string('extension')->nullable();
            $table->text('path');
            $table->string('size');
            $table->Timestamps();
        });

        Schema::create("mediatable",function (Blueprint $table){
            $table->increments("id");
            $table->morphs("media");
            $table->Timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
