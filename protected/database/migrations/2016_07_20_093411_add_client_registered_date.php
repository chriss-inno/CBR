<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClientRegisteredDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('clients', function(Blueprint $table)
        {
            $table->date('date_registered')->nullable()->add();
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
        Schema::table('clients', function(Blueprint $table)
        {
            $table->dropColumn('date_registered');
        });
    }
}
