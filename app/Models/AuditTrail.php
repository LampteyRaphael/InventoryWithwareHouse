<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    protected $dates=['created_at','updated_at'];

    protected $table='audit_trails';

    protected $guarded = array('id','created_at','updated_at');


    protected $fillable=[
        'category','local_id','user_id'
    ];

    public function user(){

        return  $this->belongsTo(User::class);
    }

    public function local(){

        return $this->belongsTo(Locals::class);
    }

    public static function scopeGetLatest($query)
    {
        return  $query->orderBy('created_at','desc')->paginate(50);

    }
}
