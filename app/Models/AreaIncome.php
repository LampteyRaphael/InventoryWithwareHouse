<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaIncome extends Model
{
    protected $dates=['created_at','updated_at'];

    protected $table='area_incomes';

    protected $guarded = array('id','created_at','updated_at');


    protected $fillable=[
        'area_income_categories_id',
        'area_id',
        'amount',
        'description',
        'created_at'
    ];

    public function getNameAttribute($value){

        return ucwords($value);
    }

    public function setNameAttribute($value){

        return $this->attributes['name']=ucwords($value);
    }
}
