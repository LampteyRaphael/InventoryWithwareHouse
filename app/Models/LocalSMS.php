<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalSMS extends Model
{

    //sending sms to your church members

    protected $dates=['created_at','updated_at'];

    protected $table='local_s_m_s_s';

    protected $guarded = array('id','created_at','updated_at');


    protected  $fillable=[
        'smsGeneratedCode',
        'smsVerificationCode',
        'amount',
        'smsToPost',
        'smsPosted',
        'local_id',
        'is_active',
        'block',
    ];

}
