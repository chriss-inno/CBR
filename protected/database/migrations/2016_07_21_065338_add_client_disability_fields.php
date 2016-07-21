<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClientDisabilityFields extends Migration
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
            $table->integer('category_id')->nullable()->add();
            $table->text('disability_diagnosis');
            $table->text('remarks')->nullable();
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
        //
        Schema::table('clients', function(Blueprint $table)
        {
            $table->dropColumn('category_id');
            $table->dropColumn('disability_diagnosis');
            $table->dropColumn('remarks');
        });
    }
}
