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
            $table->string('matricula')->unique();
            $table->dateTime('matricula_data');
            $table->boolean('matricula_tercera')->default(false);
            $table->unsignedInteger('km');
            $table->dateTime('km_data');
            $table->dateTime('manteniment_data');
            $table->unsignedInteger('proper_manteniment_km');
            $table->dateTime('proper_manteniment_data');
            $table->time('hores_bomba');
            $table->string('num_xasis')->unique();
            $table->dateTime('itv_vigor');
            $table->dateTime('itv_propera');
            $table->string('marca_model');
            $table->string('motor_potencia');
            $table->decimal('eslora', 6, 2);
            $table->dateTime('baixa_prevista');
            $table->boolean('donat_de_baixa')->default(false);
            $table->unsignedInteger('asseg_num_polissa');
            $table->enum('asseg_tipus', ['0', '3']); // 0 = Tot risc; 3 = Tercers.
            $table->unsignedInteger('places');
            $table->string('roda_dimensio');
            $table->enum('roda_cadenes', ['no', 'textil', 'metalica']);
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
