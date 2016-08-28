<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addprogressnumber2clientdisability extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('client_disabilities', function(Blueprint $table)
        {
            $table->string('progress_number')->nullable();
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
        Schema::table('client_disabilities', function(Blueprint $table)
        {
            $table->dropColumn('progress_number');
        });
    }
}
