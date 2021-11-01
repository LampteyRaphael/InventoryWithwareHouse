<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use League\Flysystem\Adapter\Local;

class LocalDocumentsCategory extends Model
{
    //
    protected $table='local_documents_categories';
    protected $dates=['created_at','updated_at'];
//    protected $guarded = array('id','created_at','updated_at');

    protected $fillable=[
        'name',
        'local_id',
    ];


//    public function local(){
//        return $this->belongsToMany(Locals::class,'local_id','id');
//    }

}
