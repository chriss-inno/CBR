<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientReferralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_referrals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->string('referral_to')->nullable();
            $table->string('referral_date')->nullable();
            $table->text('history')->nullable();
            $table->text('examination')->nullable();
            $table->text('referral_reason')->nullable();
            $table->string('referred_by_name')->nullable();
            $table->string('referred_by_title')->nullable();
            $table->string('referred_by_date')->nullable();
            $table->string('findings')->nullable();
            $table->string('findings_name')->nullable();
            $table->string('findings_title')->nullable();
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
        Schema::drop('client_referrals');
    }
}
