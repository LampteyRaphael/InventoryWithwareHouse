<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NationalExpenditureCategory extends Model
{

    protected $dates=['created_at','updated_at'];

    protected $table='national_expenditure_categories';

    protected $guarded = array('id','created_at','updated_at');

    //national expenditure category
    protected $fillable=[
        'name'
    ];
}
