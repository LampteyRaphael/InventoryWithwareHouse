<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostExpenses extends Model
{


    protected $dates=['created_at','updated_at'];

    protected $table='post_expenses';

    protected $guarded = array('id','created_at','updated_at');


    protected $fillable=[
        'expenditureCategory',
        'amount',
        'local_id'
    ];
}
