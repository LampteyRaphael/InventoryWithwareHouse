<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaExpenditure extends Model
{
    protected $dates=['created_at','updated_at'];

    protected $table='area_expenditures';

    protected $guarded = array('id','created_at','updated_at');

    protected $fillable=[
        'area_income_categories_id',
        'area_id',
        'amount',
        'description',
        'created_at',
    ];

    public function category(){

        return $this->belongsTo(AreaExpenditureCategory::class,'area_id','id');
    }
}
