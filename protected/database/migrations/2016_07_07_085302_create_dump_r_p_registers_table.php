<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDumpRPRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dump_r_p_registers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_no')->nullable();
            $table->date('attendance_date');
            $table->text('assistance_provided')->nullable();
            $table->text('progress')->nullable();
            $table->text('remarks')->nullable();
            $table->text('error_descriptions')->nullable();
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
        Schema::drop('dump_r_p_registers');
    }
}
