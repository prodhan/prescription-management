<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Worker extends Model
{
    use SoftDeletes;
    protected $dates=['deleted_at'];

    protected $table='workers';
    protected $fillable=[
        'name',
        'sex',
        'designation',
        'joining_date',
        'phone',
        'religion',
        'blood_group',
        'address',
        'email',
        'photo',
        'nid',
    ];
}
