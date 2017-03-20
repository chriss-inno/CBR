<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtectionAssessmentNeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protection_assessment_needs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assessment_id')->unsigned();
            $table->string('needs')->nullable();
            $table->timestamps();
            $table->foreign('assessment_id')->references('id')->on('protection_assessments')
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
        Schema::drop('protection_assessment_needs');
    }
}
