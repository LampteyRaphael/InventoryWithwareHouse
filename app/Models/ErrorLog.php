<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErrorLog extends Model
{
    protected $dates=['created_at','updated_at'];

    protected $table='error_logs';

    protected $guarded = array('id','created_at','updated_at');


    protected $fillable=[
        'local_id',
        'name',
        'details'
    ];

    public function local(){

        return $this->belongsTo(Locals::class);
    }
}
