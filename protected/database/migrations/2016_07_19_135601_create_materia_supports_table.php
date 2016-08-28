<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriaSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia_supports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('beneficiary_id');
            $table->string('progress_number');
            $table->string('item');
            $table->string('category');
            $table->integer('quantity');
            $table->string('donor_type');
            $table->date('distributed_date');
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
        Schema::drop('materia_supports');
    }
}
