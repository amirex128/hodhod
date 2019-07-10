<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('discount_id')->unsigned()->nullable();
            $table->integer('province_id')->unsigned()->nullable();
            $table->integer('payment_type')->nullable();
            $table->integer('surprize')->nullable();
            $table->string('receiver_name')->nullable();
            $table->string('receiver_mobile')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('location')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('code_phone')->nullable();
            $table->string('admin_description')->nullable();
            $table->string('user_description')->nullable();

            $table->integer('total_price')->nullable();
            $table->integer('total_raw')->nullable();
            $table->integer('discount_price')->nullable();
            $table->integer('province_price')->nullable();

            $table->integer('payment_status')->nullable();
            $table->integer('time_receive')->nullable();
            $table->timestamp('receive_at')->nullable();
            $table->string('payment_reference')->nullable();
            $table->string('payment_authority')->nullable();
            $table->integer('status')->nullable();
            $table->integer('visit')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *3200
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
