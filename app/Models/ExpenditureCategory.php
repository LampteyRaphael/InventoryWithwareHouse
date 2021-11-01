<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenditureCategory extends Model
{
    protected $dates=['created_at','updated_at'];

    protected $table='expenditure_categories';

    protected $guarded = array('id','created_at','updated_at');


    protected $fillable=[
        'name',
        'local_id'
    ];

    public function setNameAttribute($value){


        return $this->attributes['name']=ucwords($value);

    }

    public function getNameAttribute($value){

        return ucwords($value);
    }

    public function locals(){

        return $this->belongsTo(Locals::class);
    }

    public function expenditure(){

        return $this->belongsTo(Expenditure::class);
    }
}
