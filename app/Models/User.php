<?php

namespace App\Models;

use App\Area;
use App\Attendance;
use App\ChildrenParents;
use App\District;
use App\ErrorLog;
use App\Locals;
use App\Photo;
use App\Post;
use App\PostTithe;
use App\Region;
use App\TextField;
use App\Transfer;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $dates=['created_at','updated_at'];

    protected $table='users';

    protected $guarded = array('id','members_id','created_at','updated_at');

    protected $fillable = [
        'region_id',
        'local_id',
        'district_id',
        'area_id',
        'name',
        'surname',
        'othername',
        'gender',
        'birthDate',
        'placeOfBirth',
        'hometown',
        'hometown_region',
        'nationality',
        'languagess',
        'maritalStatus',
        'mariagetype',
        'spouseName',
        'numberOfChildren',
        'fathers_name',
        'fathers_hometown',
        'mothers_name',
        'mothers_hometown',
        'digitalAddress',
        'houseaddress',
        'streetname',
        'landmark',
        'mobileNumber1',
        'mobileNumber2',
        'workNumber',
        'whatsappNumber',
        'email',
        'education',
        'courseStudied',
        'employmentType',
        'profOccupation',
        'placeOfWork',
        'datejoinchurch',
        'previousdenomination',
        'waterBaptism',
        'baptismBy',
        'baptismDate',
        'baptismLocality',
        'rightHandOfFellowship',
        'communicant',
        'holySpiritBaptism',
        'anySpiritualGift',
        'pleaseIndicate',
        'officeHeld',
        'ordainedBy',
        'dateOrdained',
        'movementGroup',
        'position',
        'role_id',
        'is_active',
        'password',
        'members_id',
        'photo_id',
    ];

    public function isOnline()
    {
        return Cache::has('user-is-online-' .$this->id);
    }

    protected $hidden = [
        'password', 'remember_token','members_id'
    ];

    public function role(){
          return $this->belongsTo(Role::class,'role_id','id');
     }



     public function isAdminHeadQuarters(){
        if ($this->role->name=='national administrator'
            && auth()->user()->is_active==1){
            return true;
        }
        return false;
    }

    public function isAreaAdmin(){

        if ($this->role->name=='area administrator'&& auth()->user()->is_active==1
            || $this->role->name=='area anonymous' && auth()->user()->is_active==1
            || $this->role->name=='special area administrator' && auth()->user()->is_active==1
            || $this->role->name=='im area administrator'&& auth()->user()->is_active==1
            ){
            return true;
        }
        return false;
    }

    public function isAdminDistrict(){
        if ($this->role->name==='district administrator' && auth()->user()->is_active==1
            || $this->role->name==='im district administrator'&& auth()->user()->is_active==1
            || $this->role->name==='district anonymous' && auth()->user()->is_active==1
            || $this->role->name==='special district administrator' && auth()->user()->is_active==1
            ){
            return true;
        }
        return false;
    }

    public  function isAdminLocal(){
        if ($this->role->name=='local administrator' && auth()->user()->is_active==1
            || $this->role->name=='im local administrator' && auth()->user()->is_active==1
            || $this->role->name=='local anonymous' && auth()->user()->is_active==1
            || $this->role->name=='special local administrator' && auth()->user()->is_active==1
          ){
            return true;
        }
        return false;
    }

    public function isMember(){
        if (
            $this->role->name=='member' && auth()->user()->is_active==1
            || $this->role->name=='im church member'&& auth()->user()->is_active==1
        ){
            return true;
        }
        return false;
    }

    public function photo(){
      return  $this->belongsTo(Photo::class,'photo_id','id');

    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function transfer(){
        return $this->belongsTo(Transfer::class);
    }

    public function chart(){
        return $this->hasMany(TextField::class);
    }

    public function getNameAttribute($value){
        return strtoupper($value);
    }

    public function getOfficeHeldAttribute($value){
        return strtoupper($value);
    }

    public function setNameAttribute($value){
        return $this->attributes['name']=strtoupper($value);
    }

    public static function scopeGetLatest($query)
    {
      return  $query->orderBy('members_id','asc')->paginate(50);
    }

    public function parents(){
        return  $this->belongsTo(ChildrenParents::class,'id','user_id');
    }

    public function local(){
        return $this->belongsTo(Locals::class,'local_id','id');
    }

    public  function post_tithe(){
        return $this->hasMany(PostTithe::class);
    }

    public function district(){
        return $this->belongsTo(District::class,'district_id','id');
    }

    public function errorLog(){
        return $this->belongsTo(ErrorLog::class);
    }

    public function area(){
        return $this->belongsTo(Area::class,'area_id','id');
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function atten(){
        return $this->hasMany(Attendance::class);
   }



//    public function setBirthDateAttribute($value)
//    {
//   //    return $this->attributes['birthDate'] = Carbon::parse($value)->format('Y-m-d');
//    }

//    public function getBirthDateAttribute($value)
//    {
//        return  Carbon::parse(date("Y-m-d", strtotime(str_replace($value,'-','/'))));
//    }

//     public  function getIdAttribute($id){
//
//         return $this->attributes['id']=Crypt::encrypt($id);
//     }



//    public function getAttribute($value){
//
//        return strtoupper($value);
//    }



}
