<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DistrictCircular extends Model
{
    protected $dates=['created_at','updated_at'];

    protected $table='district_circulars';

    protected $guarded = array('id','created_at','updated_at');

    protected $uploads='/DistrictPdf/';
    //district circular
    protected $fillable=[
        'name','district_id'
    ];


    public function getNameAttribute($pdf){

        return $this->uploads.$pdf;
    }
    
    public function district(){

        return $this->belongsTo(District::class);
    }
}
