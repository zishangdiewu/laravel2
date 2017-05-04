<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCartsItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('cart_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ca_id');
            $table->integer('g_id');
			$table->integer('g_name');
			$table->integer('g_num');
			$table->integer('g_price');
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
        //
        Schema::drop('cart_items');
    }
}
