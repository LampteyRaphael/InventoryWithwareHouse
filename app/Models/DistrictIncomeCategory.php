<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DistrictIncomeCategory extends Model
{
    protected $dates=['created_at','updated_at'];

    protected $table='district_income_categories';

    protected $guarded = array('id','created_at','updated_at');

    protected $fillable=[
        'name',
        'district_id'
    ];

    public function getNameAttribute($value){

        return ucwords($value);
    }

    public function setNameAttribute($value){

        return $this->attributes['name']=ucwords($value);
    }

}
