<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DistrictExpenditure extends Model
{
    protected $dates=['created_at','updated_at'];

    protected $table='district_expenditures';

    protected $guarded = array('id','created_at','updated_at');

    protected $fillable=[
        'district_income_categories_id',
        'district_id',
        'amount',
        'description',
        'created_at',
    ];
}
