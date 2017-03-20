<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialSuportItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_support_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('support_id')->unsigned()->nullable();
            $table->integer('beneficiary_id')->unsigned()->nullable();
            $table->integer('item_id')->unsigned()->nullable();
            $table->integer('quantity');
            $table->date('distributed_date')->nullable();
            $table->timestamps();
            $table->foreign('support_id')->references('id')->on('material_supports')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('beneficiary_id')->references('id')->on('beneficiaries')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('material_support_items');
    }
}
