<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_assessments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
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
        Schema::drop('client_assessments');
    }
}
