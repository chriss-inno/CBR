<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePSNCaseReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_s_n_case_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('psn_id');
            $table->string('needs_status')->nullable();
            $table->text('comments')->nullable();
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
        Schema::drop('p_s_n_case_reviews');
    }
}
