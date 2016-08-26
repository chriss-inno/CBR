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
            $table->string('sex')->nullable();
            $table->string('age')->nullable();
            $table->string('category')->nullable();
            $table->string('position')->nullable();
            $table->string('group')->nullable();
            $table->string('zone')->nullable();
            $table->string('activity')->nullable();
            $table->string('donor')->nullable();
            $table->date('registration_date')->nullable();
            $table->string('phone')->nullable();
            $table->string('nationality')->nullable();
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
