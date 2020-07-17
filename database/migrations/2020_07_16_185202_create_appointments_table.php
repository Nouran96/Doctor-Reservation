<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
                $table->id();
                $table->string('pain_type');
                $table->string('speciality');
                $table->datetime('reservation_date')->nullable();
                $table->unsignedBigInteger('patient_id');
                $table->unsignedBigInteger('doctor_id')->nullable();
                $table->foreign('patient_id')->references('id')->on('patients');
                $table->foreign('doctor_id')->references('id')->on('doctors');
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
        Schema::dropIfExists('appointments');
    }
}
