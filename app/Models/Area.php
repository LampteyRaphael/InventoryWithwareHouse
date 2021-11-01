<?php

namespace App\Models;

use App\Currency;
use App\Transfer;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $dates=['created_at','updated_at'];

    protected $table='areas';

    protected $guarded = array('id','created_at','updated_at');

    protected $fillable=[
        'region_id',
        'name',
        'area_code',
        'date',
        'currencies_id',
    ];


    public function getNameAttribute($value){

        return strtoupper($value);
    }

    public function setNameAttribute($value){

        return $this->attributes['name']=strtoupper($value);
    }

//    public function district(){
//
//        return $this->hasOne(District::class,'area_id','id');
//    }

    public function scopeGetLatest($value)
    {
        return $value->orderBy('area_code','asc')->paginate(50);
    }


    public function  region(){

        return $this->belongsTo(Region::class,'region_id','id');
    }

    public function transfer(){

        return $this->belongsTo(Transfer::class);
    }

    public function currency(){
        return $this->belongsTo(Currency::class,'currencies_id','id');
    }

}
