<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePSNAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_s_n_assessments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->text('ration_card')->nullable();
            $table->text('family_size')->nullable();
            $table->text('progress_number')->nullable();
            $table->text('foster_care')->nullable();
            $table->text('nature_case')->nullable();
            $table->text('nature_case_other')->nullable();
            $table->string('family_relationship')->nullable();
            $table->text('hist_problem')->nullable();
            $table->text('hist_problem_when')->nullable();
            $table->text('hist_causes')->nullable();
            $table->text('hist_problem_related')->nullable();
            $table->text('community_initiatives')->nullable();
            $table->text('action_planning')->nullable();
            $table->text('general_remarks')->nullable();
            $table->text('follow_up')->nullable();
            $table->string('caregiver_name')->nullable();
            $table->date('caregiver_date')->nullable();
            $table->string('interviewer_name')->nullable();
            $table->date('interviewer_date')->nullable();
            $table->string('reviewer_name')->nullable();
            $table->date('reviewer_date')->nullable();
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
        Schema::drop('p_s_n_assessments');
    }
}
