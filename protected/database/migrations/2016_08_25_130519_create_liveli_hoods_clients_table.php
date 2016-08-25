<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiveliHoodsClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liveli_hoods_clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('progress_number');
            $table->string('full_name');
            $table->string('sex');
            $table->string('age');
            $table->string('category');
            $table->string('position');
            $table->string('group');
            $table->string('zone');
            $table->string('activity');
            $table->string('donor');
            $table->string('registration_date');
            $table->string('phone');
            $table->string('nationality');
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
        Schema::drop('liveli_hoods_clients');
    }
}
