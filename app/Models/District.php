<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $dates=['created_at','updated_at'];

    protected $table='districts';

    protected $guarded = array('id','created_at','updated_at');


    protected $fillable=[
      'name',
      'area_id',
      'district_code',
      'date'
    ];

    public function getNameAttribute($value){

        return strtoupper($value);
    }

    public function setNameAttribute($value){

        return $this->attributes['name']=strtoupper($value);
    }

//    public function locals(){
//
//        return $this->belongsTo(Locals::class);
//    }

    public function area(){

        return $this->belongsTo(Area::class,'area_id','id');
    }

    public function scopeGetLatest($value)
    {
        return $value->orderBy('district_code','asc')->paginate(50);
    }
}
