<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table='shefa_patients';
    protected $fillable=[
        'name',
        'phone',
        'address',
        'age',
        'gender',
        'blood_group',
        'refer_type',
        'refer_by',
        'relation_referer',
    ];
}
