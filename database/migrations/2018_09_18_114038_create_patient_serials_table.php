<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientSerialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_serials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id');
            $table->string('serial');
            $table->text('name');
            $table->string('age');
            $table->string('gender');
            $table->text('dr_name');
            $table->text('time');
            $table->text('room_no');
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
        Schema::dropIfExists('patient_serials');
    }
}
