<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiveliHoodsMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liveli_hoods_materials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('progress_number');
            $table->string('support_date');
            $table->string('venue');
            $table->string('item_support');
            $table->string('donor');
            $table->integer('quantity');
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
        Schema::drop('liveli_hoods_materials');
    }
}
