<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrthopedicServicesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orthopedic_services_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ors_id');
            $table->string('service_received')->nullable();
            $table->string('item_serviced')->nullable();
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
        Schema::drop('orthopedic_services_items');
    }
}
