<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NationalIncomeCategory extends Model
{

    //creating income category
    protected $dates=['created_at','updated_at'];

    protected $table='national_income_categories';

    protected $guarded = array('id','created_at','updated_at');

    protected $fillable=[
        'name'
    ];

    public function setNameAttribute($value)
    {

        return $this->attributes['name']=strtoupper($value);

    }
}
