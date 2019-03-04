<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientSerial extends Model
{
    protected $table='patient_serials';
    protected $fillable=[
        'patient_id',
        'serial',
        'name',
        'age',
        'gender',
        'dr_name',
        'date',
        'phone',
        'time',
        'room_no',
        'added_by',
        'status',
    ];
}
