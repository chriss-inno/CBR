<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_cases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->string('case_name');
            $table->string('file_no');
            $table->date('opened_date')->nullable();
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
        Schema::drop('client_cases');
    }
}
