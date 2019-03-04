<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToPatientSerials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_serials', function($table) {
            $table->date('date')->after('dr_name');
            $table->string('phone')->after('date');
            $table->integer('added_by')->after('room_no');
            $table->integer('status')->after('added_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_serials', function($table) {
            $table->dropColumn('date');
            $table->dropColumn('phone');
            $table->dropColumn('added_by');
            $table->dropColumn('status');
        });
    }
}
