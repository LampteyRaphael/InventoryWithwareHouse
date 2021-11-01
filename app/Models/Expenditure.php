<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    protected $dates=['created_at','updated_at'];

    protected $table='expenditures';

    protected $guarded = array('id','updated_at');


    protected $fillable=[
        'category_id',
        'local_id',
        'amount',
        'description',
        'created_at'
    ];

    public function expenditurecategory(){

        return $this->belongsTo(ExpenditureCategory::class);
    }
}
