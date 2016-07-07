<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDumpBeneficiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dump_beneficiaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('progress_number')->nullable();
            $table->string('full_name')->nullable();
            $table->date('date_registration')->nullable();
            $table->string('category')->nullable();
            $table->string('code')->nullable();
            $table->string('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('family_size')->nullable();
            $table->integer('number_females')->nullable();
            $table->integer('number_male')->nullable();
            $table->string('error_descriptions')->nullable();
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
        Schema::drop('dump_beneficiaries');
    }
}
