<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextField extends Model
{
    //text messages to every users
    protected $fillable=[
        'user_id',
        'local_id',
        'text',
        'reply',
        'region_id',
        'district_id',
        'area_id'
    ];

    protected $dates=['created_at','updated_at'];

    protected $table='text_fields';

    protected $guarded = array('id','created_at','updated_at');


    public function user(){

        return $this->belongsTo(User::class);
    }

    public function photo(){

        return  $this->belongsTo(Photo::class);
    }

    public function local(){
        return $this->belongsTo(Locals::class);
    }


    public function area(){
        return $this->belongsTo(Area::class);
    }

}
