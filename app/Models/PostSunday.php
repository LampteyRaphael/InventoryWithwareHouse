<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostSunday extends Model
{
    protected $dates=['created_at','updated_at'];

    protected $table='post_sundays';

    protected $guarded = array('id','created_at','updated_at');


    protected $fillable=
        [
    'offering',
    'tithe',
    'donation',
    'envelop',
    'fundraising',
    'typeofevent',
     'local_id',
    ];



}
