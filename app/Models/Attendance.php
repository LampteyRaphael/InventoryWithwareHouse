<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $dates=['created_at','updated_at'];
    protected $table='attendances';
    protected $guarded = array('id','created_at','updated_at');
    protected $fillable=[
        'local_id',
        'talley',
        'category',
        'ministers',
        'elders',
        'deacon',
        'deaconess',
        'male',
        'female',
        'children',
        'visitors',
        'created_at',
        'attendance_categories_id',
        'date',
        'childrenMinistry',
        'jYouthMinistry',
        'sYouthMinistry',
        'womensMinistry',
        'mensMinistry',
        'membersAttendingCellGroup',
        'wednesdayTeaching',
        'fridayTeaching',
        'adultSundaySchool',
        'adultMaleAtWeekendService',
        'adultFemaleAtWeekendService',
        'guestsVisitors',
        'volunteersforweekendservice',
        'preBaptismalClass',
        'postBaptismalClass',
        'ministryDeptalLeaders',
        'presbyters',
        'attendance_sub_categories_id',
    ];
    public function attendance(){
        return $this->belongsTo(AttendanceCategory::class,'attendance_categories_id','id');
    }
    public function attendanceSub(){
        return $this->belongsTo(AttendanceSubCategory::class,'attendance_sub_categories_id','id');
    }

}
