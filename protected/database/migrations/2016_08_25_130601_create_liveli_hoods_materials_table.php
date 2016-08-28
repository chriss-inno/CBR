<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiveliHoodsMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liveli_hoods_materials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('supported_name')->nullable();
            $table->integer('client_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->string('support_date')->nullable();
            $table->string('venue')->nullable();
            $table->string('item_support')->nullable();
            $table->string('donor')->nullable();
            $table->string('category_type')->nullable();
            $table->string('category')->nullable();
            $table->integer('quantity')->nullable();
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
        Schema::drop('liveli_hoods_materials');
    }
}
