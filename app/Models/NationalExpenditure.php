<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NationalExpenditure extends Model
{

    protected $dates=['created_at','updated_at'];

    protected $table='national_expenditures';

    protected $guarded = array('id','created_at','updated_at');

    protected $fillable=[
        'category_id',
        'amount',
        'description'
    ];
}
