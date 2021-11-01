<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceSubCategory extends Model
{

    protected $table='attendance_sub_categories';
    protected $fillable=['name'];
}
