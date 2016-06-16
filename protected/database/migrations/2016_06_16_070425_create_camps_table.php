<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reg_no');
            $table->string('camp_name');
            $table->string('description');
            $table->string('address');
            $table->string('tel');
            $table->string('zone');
            $table->integer('region_id');
            $table->integer('district_id');
            $table->string('status')->default('working');
            $table->string('input_by')->nullable();
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
        Schema::drop('camps');
    }
}
