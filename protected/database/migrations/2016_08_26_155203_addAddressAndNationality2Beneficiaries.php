<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddressAndNationality2Beneficiaries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //
        Schema::table('beneficiaries', function(Blueprint $table)
        {
            $table->string('address')->nullable()->add();
            $table->string('nationality')->nullable()->add();
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
        Schema::table('beneficiaries', function(Blueprint $table)
        {
            $table->dropColumn('address');
            $table->dropColumn('nationality');
        });
    }
}
