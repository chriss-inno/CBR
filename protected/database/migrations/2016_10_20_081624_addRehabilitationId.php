<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRehabilitationId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('rehabilitation_progresses', function(Blueprint $table)
        {
            $table->string('rehabilitation_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('rehabilitation_progresses', function(Blueprint $table)
        {
            $table->dropColumn('rehabilitation_id');
        });
    }
}
