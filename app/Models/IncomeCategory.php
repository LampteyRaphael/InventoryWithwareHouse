<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncomeCategory extends Model
{



    protected $dates=['created_at','updated_at'];

    protected $table='income_categories';

    protected $guarded = array('id','created_at','updated_at');

    protected $fillable=[
        'name',
        'local_id'
    ];

    public function setNameAttribute($value){

         $this->attributes['name']=ucwords($value);
    }

    public function getNameAttribute($value){

        return ucwords($value);
    }

    public function locals(){

        return $this->belongsTo(Locals::class);
    }
}
