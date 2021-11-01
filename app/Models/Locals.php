<?php

namespace App\Models;

use App\LocalDocumentsCategory;
use Illuminate\Database\Eloquent\Model;

class Locals extends Model
{
    protected $dates=['created_at','updated_at'];
    protected $table='locals';
    protected $guarded = array('id','created_at','updated_at');
    protected $fillable=[
        'name',
        'district_id',
        'local_code',
    ];

    public function getNameAttribute($value){

        return strtoupper($value);
    }

    public function setNameAttribute($value){

        return $this->attributes['name']=strtoupper($value);
    }


    public  function localDCategory(){

        return $this->belongsTo(LocalDocumentsCategory::class,'id','local_id');
    }


    public function scopeGetLatest($value)
    {
        return $value->orderBy('local_code','asc')->paginate(50);
    }

    public function district(){

        return $this->belongsTo(District::class,'district_id','id');
    }



}
