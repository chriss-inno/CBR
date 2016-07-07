<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDumpAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dump_assessments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_number')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->date('dob')->nullable();
            $table->integer('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('nationality')->nullable();
            $table->string('zone')->nullable();
            $table->integer('camp_id')->nullable();
            $table->integer('center_id')->nullable();
            $table->integer('region_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->string('ward')->nullable();
            $table->string('street')->nullable();
            $table->string('status')->nullable();
            $table->string('consultation_no')->nullable();
            $table->date('consultation_date')->nullable();
            $table->text('diagnosis')->nullable();
            $table->text('medical_history')->nullable();
            $table->text('social_history')->nullable();
            $table->text('employment')->nullable();
            $table->text('skin_condition')->nullable();
            $table->text('daily_activities')->nullable();
            $table->text('remarks')->nullable();
            $table->text('joint_assessment')->nullable();
            $table->text('muscle_assessment')->nullable();
            $table->text('functional_assessment')->nullable();
            $table->text('problem_list')->nullable();
            $table->text('treatment')->nullable();
            $table->string('examiner_name')->nullable();
            $table->string('examiner_title')->nullable();
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
        Schema::drop('dump_assessments');
    }
}
