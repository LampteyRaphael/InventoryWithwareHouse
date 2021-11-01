<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    //balance brought forward

//    protected $primaryKey='id';
//    protected $dates;
    protected $table='balances';
    protected $fillable=[
        'local_id',
        'amount',
        'year',
    ];
}
