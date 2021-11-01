<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NationalIncome extends Model
{
    protected $dates=['created_at','updated_at'];

    protected $table='national_incomes';

    protected $guarded = array('id','created_at','updated_at');


    protected $fillable=[
        'category_id',
        'amount',
        'description'
    ];
}
