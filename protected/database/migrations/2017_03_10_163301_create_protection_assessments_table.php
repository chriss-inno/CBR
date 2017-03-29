<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtectionAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protection_assessments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('beneficiary_id')->unsigned();
            $table->string('progress_number')->nullable();
            $table->string('fs')->nullable();
            $table->string('code')->nullable();
            $table->date('assessment_date')->nullable();
            $table->string('assessment_place')->nullable();
            $table->string('name')->nullable();
            $table->string('sex')->nullable();
            $table->date('dob')->nullable();
            $table->string('hh_household')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('residence_status')->nullable();
            $table->text('condition')->nullable();
            $table->text('history')->nullable();
            $table->text('action_plan')->nullable();
            $table->timestamps();
			$table->foreign('beneficiary_id')->references('id')->on('beneficiaries')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('protection_assessments');
    }
}
