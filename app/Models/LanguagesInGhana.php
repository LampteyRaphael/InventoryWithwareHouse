<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LanguagesInGhana extends Model
{
    protected $dates=['created_at','updated_at'];

    protected $table='languages_in_ghanas';

    protected $guarded = array('id','created_at','updated_at');


    protected $fillable=['name'];

    public function getNameAttribute($value){

        return ucwords($value);
    }

    public function setNameAttribute($value){

        return $this->attributes['name']=ucwords($value);
    }

    public static function scopeGetLatest($query)
    {
        return  $query->orderBy('name','ASC')->pluck('name','name')->all();

    }

}
