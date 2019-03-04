<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('phone');
            $table->text('sex');
            $table->text('specialist')->nullable();
            $table->text('religion')->nullable();
            $table->text('blood_group')->nullable();
            $table->longText('address')->nullable();
            $table->text('email')->nullable();
            $table->text('designation')->nullable();
            $table->text('joining_date')->nullable();
            $table->longText('photo')->nullable();
            $table->longText('nid')->nullable();
            $table->integer('balance')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('doctors');
    }
}
