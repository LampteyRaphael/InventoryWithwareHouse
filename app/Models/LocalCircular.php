<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalCircular extends Model
{
    //local circular of a particular area
    protected $fillable=[
      'name',
      'local_id',
    ];

    protected $dates=['created_at','updated_at'];

    protected $table='local_circulars';

    protected $guarded = array('id','created_at','updated_at');



    protected $uploads='/LocalMembers/';

    public function getNameAttribute($pdf){

        return $this->uploads.$pdf;
    }
    public function local(){

      return $this->belongsTo(Locals::class);
  }
}
