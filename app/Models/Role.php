<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //

    protected $dates=['created_at','updated_at'];

    protected $table='roles';

    protected $guarded = array('id','created_at','updated_at');

    protected $fillable=[
        'name','gurd'
    ];



}
