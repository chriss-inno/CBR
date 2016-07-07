<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRehabilitationProgressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rehabilitation_progresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_no')->nullable();
            $table->date('attendance_date');
            $table->text('assistance_provided')->nullable();
            $table->text('progress')->nullable();
            $table->text('remarks')->nullable();
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
        Schema::drop('rehabilitation_progresses');
    }
}
