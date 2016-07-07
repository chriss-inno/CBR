<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('progress_number')->unique();
            $table->string('full_name')->nullable();
            $table->date('date_registration')->nullable();
            $table->string('category')->nullable();
            $table->string('code')->nullable();
            $table->string('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('family_size')->nullable();
            $table->integer('number_females')->nullable();
            $table->integer('number_male')->nullable();
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
        Schema::drop('beneficiaries');
    }
}
