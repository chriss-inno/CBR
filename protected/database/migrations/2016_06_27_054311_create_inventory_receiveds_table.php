<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryReceivedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_receiveds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_id');
            $table->integer('quantity');
            $table->string('remarks');
            $table->string('received_by');
            $table->string('received_date');
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
        Schema::drop('inventory_receiveds');
    }
}
