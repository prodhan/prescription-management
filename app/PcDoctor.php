<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PcDoctor extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table='pcdoctors';
    protected $fillable=[
        'name',
        'phone',
        'sex',
        'org_name',
        'blood_group',
        'address',
        'email',
        'designation',
        'photo',
        'nid',
    ];
}
