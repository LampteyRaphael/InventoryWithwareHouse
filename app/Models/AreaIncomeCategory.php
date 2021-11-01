<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaIncomeCategory extends Model
{
    protected $dates=['created_at','updated_at'];

    protected $table='area_income_categories';

    protected $guarded = array('id','created_at','updated_at');


    protected $fillable=[
        'name',
        'area_id'
    ];

    public function getNameAttribute($value){

        return ucwords($value);
    }

    public function setNameAttribute($value){

        return $this->attributes['name']=ucwords($value);
    }
}
