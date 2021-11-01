<?php

namespace App\Models;

use App\Area;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $dates=['created_at','updated_at'];

    protected $table='regions';

    protected $guarded = array('id','created_at','updated_at');


    // region
    protected $fillable=[
        'name','countries_id'
    ];

    public function getNameAttribute($value){

        return strtoupper($value);
    }

    public function setNameAttribute($value){

        return $this->attributes['name']=strtoupper($value);
    }

    public function area(){

        return $this->hasOne(Area::class,'region_id','id');
    }


    public function scopeGetLatest($value){

        return $value->orderBy('name','asc')->get();
    }


}
