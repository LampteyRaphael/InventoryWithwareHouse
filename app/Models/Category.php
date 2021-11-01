<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static lists($string, $string1)
 */
class Category extends Model
{
    protected $dates=['created_at','updated_at'];

    protected $table='categories';

    protected $guarded = array('id','created_at','updated_at');


    protected  $fillable=[
        'name'
    ];



    public function getNameAttribute($value){

        return strtoupper($value);
    }

    public function setNameAttribute($value){

        return $this->attributes['name']=strtoupper($value);
    }






}
