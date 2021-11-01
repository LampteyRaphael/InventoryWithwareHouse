<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaCircular extends Model
{
    protected $dates=['created_at','updated_at'];
    protected $table='area_circulars';
    protected $guarded = array('id','created_at','updated_at');
    protected $uploads='/NationalPdf/';
    //area circulating
    protected $fillable=[
        'name',
    ];
    public function getNameAttribute($pdf){
        return $this->uploads.$pdf;
    }
    public function area(){
        return $this->belongsTo(Region::class);
    }
}
