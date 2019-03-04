<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->string('gender');
            $table->string('age');
            $table->integer('fee')->default(0);
            $table->integer('dr_name');
            $table->date('date');
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('b_pressure')->nullable();
            $table->text('food')->nullable();
            $table->date('follow_up')->nullable();
            $table->longText('diseases')->nullable();
            $table->longText('tests')->nullable();
            $table->longText('p_medicines')->nullable();
            $table->longText('advices')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('prescriptions');
    }
}
