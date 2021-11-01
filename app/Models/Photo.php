<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //

    protected $dates=['created_at','updated_at'];

    protected $table='photos';

    protected $guarded = array('id','created_at','updated_at');

    protected $uploads='/images/';

    protected $fillable=['file'];

    public function getFileAttribute($photo){

        return $this->uploads.$photo;
    }


}
