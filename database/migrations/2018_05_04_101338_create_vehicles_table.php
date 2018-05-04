<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            // Foreign Keys.
            $table->unsignedInteger('vehicle_type_id')->nullable();
            $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types')->onDelete('set null');
            $table->unsignedInteger('vehicle_owner_id')->nullable();
            $table->foreign('vehicle_owner_id')->references('id')->on('vehicle_owners')->onDelete('set null');
            $table->unsignedInteger('vehicle_insurer_id')->nullable();
            $table->foreign('vehicle_insurer_id')->references('id')->on('vehicle_insurers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
