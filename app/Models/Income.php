<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $dates=['created_at','updated_at'];

    protected $table='incomes';

    protected $guarded = array('id','created_at','updated_at');

    protected $fillable=[
        'category_id',
        'local_id',
        'amount',
        'description',
        'created_at'
    ];
}
