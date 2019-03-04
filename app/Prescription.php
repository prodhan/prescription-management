<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $table='prescriptions';
    protected $fillable=[
        'name',
        'phone',
        'gender',
        'age',
        'fee',
        'dr_name',
        'date',
        'height',
        'weight',
        'b_pressure',
        'food',
        'follow_up',
        'diseases',
        'tests',
        'p_medicines',
        'advices',
        'status'

    ];
}
