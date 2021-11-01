<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalDocuments extends Model
{
    protected $dates=['created_at','updated_at'];
    protected $table='local_documents';
    protected $guarded = array('id','created_at','updated_at');
    protected $fillable=[
        'date',
        'gps',
        'nurseringOrNot',
        'localmode',
        'photo1_id',
        'local_id',
        'local_documents_categories_id',
        'comments'
    ];

    public function local(){
        return $this->belongsTo(Locals::class,'local_id','id');
    }

    public function category(){
      return  $this->belongsTo(LocalDocumentsCategory::class,'local_documents_categories_id','id');
    }

    public function photo(){
        return  $this->belongsTo(Photo::class,'photo1_id','id');
    }

    public function photo2(){
        return  $this->belongsTo(Photo::class,'photo2_id','id');
    }

    public function photo3(){
        return  $this->belongsTo(Photo::class,'photo3_id','id');
    }



}
