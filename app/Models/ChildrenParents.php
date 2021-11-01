<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildrenParents extends Model
{
    protected $dates=['created_at','updated_at'];

    protected $table='children_parents';

    protected $guarded = array('id','created_at','updated_at');


    protected $fillable=[
        'name','user_id','parent_id'
    ];

    public function parent(){
        return $this->belongsTo(User::class,'parent_id','id');
    }




}
