<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhysiotherapyRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physiotherapy_registers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->date('attendance_date');
            $table->string('file_no')->nullable();
            $table->text('diagnosis')->nullable();
            $table->text('causes')->nullable();
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
        Schema::drop('physiotherapy_registers');
    }
}
