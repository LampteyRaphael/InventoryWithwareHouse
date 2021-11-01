<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonationAndPledge extends Model
{
    protected $dates=['created_at','updated_at'];

    protected $table='donation_and_pledges';

    protected $guarded = array('id','created_at','updated_at');


    protected $fillable=[
        'user_id',
        'local_id',
        'amount',
        'modeOfPayment',
        'dateOfCheque',
        'checkNo',
        'bank',
        'donationOrPledge',
    ];

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function local(){

        return $this->belongsTo(Locals::class);
    }
}
