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
            $table->string('progress_number');
            $table->string('donor_type');
            $table->string('address');
            $table->string('item');
            $table->integer('quantity');
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
