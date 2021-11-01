<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table='countries';

    protected $guarded = array('id');


    // region
    protected $fillable=[
        'country',
        'currency',
        'symbol',
        'code',
    ];


}
