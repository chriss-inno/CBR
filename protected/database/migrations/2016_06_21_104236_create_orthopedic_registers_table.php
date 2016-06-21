<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrthopedicRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orthopedic_registers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->date('date_attended')->nullable();
            $table->string('diagnosis')->nullable();
            $table->string('appliance_provided')->nullable();
            $table->date('measurement_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::drop('orthopedic_registers');
    }
}
