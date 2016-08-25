<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiveliHoodsGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liveli_hoods_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group_name');
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
        Schema::drop('liveli_hoods_groups');
    }
}
