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
            $table->string('category')->nullable();
            $table->string('zone')->nullable();
            $table->string('activity')->nullable();
            $table->string('donor')->nullable();
            $table->string('registration_date')->nullable();
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
