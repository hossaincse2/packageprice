<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPackageQueriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_package_queries', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('order_id')->nullable(); 
            $table->unsignedBigInteger('package_id')->nullable(); 
            $table->integer('query_count');
            $table->string('domain_name');
            $table->string('ip_address');
            $table->string('request_url');
            $table->string('packages_token');
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')->on('users');

            $table->foreign('order_id')
            ->references('id')->on('orders');

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
        Schema::dropIfExists('user_package_queries');
    }
}
