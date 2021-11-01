<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceCategory extends Model
{
    protected $dates=['created_at','updated_at'];
    protected $table='attendance_categories';
    protected $guarded = array('id','created_at','updated_at');
    protected $fillable=['name','local_id'];


    public function setNameAttribute($value){
        return $this->attributes['name']=strtoupper($value);
    }

    public function getNameAttribute($value){
        return strtoupper($value);
    }



}
