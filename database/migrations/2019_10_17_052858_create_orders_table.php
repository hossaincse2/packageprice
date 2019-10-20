<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->integer('order_number');
            $table->string('payment_method');
            $table->unsignedBigInteger('user_id')->nullable(); 
            $table->unsignedBigInteger('package_id')->nullable(); 
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')->on('users');

            $table->foreign('package_id')
            ->references('id')->on('packages');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}