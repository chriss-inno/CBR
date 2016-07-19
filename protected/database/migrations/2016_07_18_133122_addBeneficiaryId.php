<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBeneficiaryId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('items_disbursements', function(Blueprint $table)
        {
            $table->string('beneficiary_id')->nullable()->add();
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
        Schema::table('items_disbursements', function(Blueprint $table)
        {
            $table->dropColumn('beneficiary_id');
        });
    }
}
