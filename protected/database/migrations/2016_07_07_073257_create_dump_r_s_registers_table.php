<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDumpRSRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dump_r_s_registers', function (Blueprint $table) {
            $table->increments('id');
            $table->date('attendance_date');
            $table->text('diagnosis')->nullable();
            $table->string('file_no')->nullable();
            $table->string('error_description')->nullable();
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
        Schema::drop('dump_r_s_registers');
    }
}
