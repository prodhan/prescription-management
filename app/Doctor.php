<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table='doctors';
    protected $fillable=[
      'name',
      'phone',
      'sex',
      'specialist',
      'religion',
      'blood_group',
      'address',
      'email',
      'designation',
      'joining_date',
      'photo',
      'nid',
    ];

}
