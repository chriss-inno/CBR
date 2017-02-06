<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDiagnosisitoBeneficiaries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('beneficiaries', function(Blueprint $table)
        {
            $table->text('diagnosis')->nullable();
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
            $table->dropColumn('diagnosis');
        });
    }
}
