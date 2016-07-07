<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDumpSocialNeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dump_social_needs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('progress_number')->nullable();
            $table->text('assistance')->nullable();
            $table->string('status')->nullable();
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
        Schema::drop('dump_social_needs');
    }
}
