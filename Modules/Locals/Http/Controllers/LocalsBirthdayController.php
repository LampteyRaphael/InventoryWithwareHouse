<?php

namespace Modules\Locals\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\unwrap;

class LocalsBirthdayController extends Controller
{
    public function index(){

        $id=Auth::user()->local_id;
        $month=Carbon::now()->month;
        $day=Carbon::now()->day;

         $days= Carbon::now()->format('H:i:s');

        $dates='Current Birthday';
        $users=User::where('local_id',$id)
         ->whereMonth('birthDate',$month)
         ->whereday('birthDate',$day)
         ->get([
             'name',
             'email',
             'photo_id',
             'birthDate',
             'mobileNumber1',
             'mobileNumber2',
             'id'
         ]);

        foreach ($users as $user){

            if ($user->mobileNumber1){
               $mobile=$user->mobileNumber1;
            }else{
                $mobile=$user->mobileNumber1;
            }

        }

//        if ($days === '12:50:00'){
//
//            $key="AhNsGnxj86pisinsRLOJpDPIe";
//            $to= $mobile;
//            $msg='Happy Birthday!' .' '. User::where('id',$user['id'])->pluck('name')->first()."\n".
//                'We Value You as a Church Member. May God Continue to blessed You and Give You More Grace ' ."\n".
//                "From National Headquarters"."\n";
//            Carbon::now()."\n";
//
//            $sender_id="Tacms";
//            $msg=urlencode($msg);
//            $url="https://apps.mnotify.net/smsapi?key=$key&to=$to&msg=$msg&sender_id=$sender_id";
//            $response=file_get_contents($url);
//
//            if($response) {
//                $smNotify= "SMS has been sent successfully";
//            } else {
//                $smNotify= "SMS has not been sent";
//            }
//        }






        return view('members.monthly-birthday',compact('users','dates'));
    }

    public function january()
    {
        $dates='January';
        $id=Auth::user()->local_id;
        $users=User::where('local_id',$id)->whereMonth('birthDate',01)->get([
            'name',
            'email',
            'photo_id',
            'birthDate',
            'mobileNumber1',
            'mobileNumber2',
            'id'
        ]);
        return view('members.monthly-birthday',compact('users','dates'));
    }

    public function febuary()
    {
        $dates='February';
        $id=Auth::user()->local_id;
        $users=User::where('local_id',$id)->whereMonth('birthDate',02)->get([
            'name',
            'email',
            'photo_id',
            'birthDate',
            'mobileNumber1',
            'mobileNumber2',
            'id'
        ]);
        return view('members.monthly-birthday',compact('users','dates'));
    }

    public function march()
    {
        $dates='March';
        $id=Auth::user()->local_id;
        $users=User::where('local_id',$id)->whereMonth('birthDate',03)->get([
            'name',
            'email',
            'photo_id',
            'birthDate',
            'mobileNumber1',
            'mobileNumber2',
            'id'
        ]);
        return view('members.monthly-birthday',compact('users','dates'));
    }


    public function april()
    {
        $dates='April';
        $id=Auth::user()->local_id;
        $users=User::where('local_id',$id)->whereMonth('birthDate',04)->get([
            'name',
            'email',
            'photo_id',
            'birthDate',
            'mobileNumber1',
            'mobileNumber2',
            'id'
        ]);
        return view('members.monthly-birthday',compact('users','dates'));
    }



    public function may()
    {
        $dates='May';
        $id=Auth::user()->local_id;
        $users=User::where('local_id',$id)->whereMonth('birthDate',05)->get([
            'name',
            'email',
            'photo_id',
            'birthDate',
            'mobileNumber1',
            'mobileNumber2',
            'id'
        ]);
        return view('members.monthly-birthday',compact('users','dates'));
    }


    public function june()
    {
        $dates='June';
        $id=Auth::user()->local_id;
        $users=User::where('local_id',$id)->whereMonth('birthDate',06)->get([
            'name',
            'email',
            'photo_id',
            'birthDate',
            'mobileNumber1',
            'mobileNumber2',
            'id'
        ]);
        return view('members.monthly-birthday',compact('users','dates'));
    }

    public function july()
    {
        $dates='July';
        $id=Auth::user()->local_id;
        $users=User::where('local_id',$id)->whereMonth('birthDate',07)->get([
            'name',
            'email',
            'photo_id',
            'birthDate',
            'mobileNumber1',
            'mobileNumber2',
            'id'
        ]);
        return view('members.monthly-birthday',compact('users','dates'));
    }

    public function august()
    {
        $dates='August';
        $id=Auth::user()->local_id;
        $users=User::where('local_id',$id)->whereMonth('birthDate',8)->get([
            'name',
            'email',
            'photo_id',
            'birthDate',
            'mobileNumber1',
            'mobileNumber2',
            'id'
        ]);
        return view('members.monthly-birthday',compact('users','dates'));
    }


    public function september()
    {
        $dates='September';
        $id=Auth::user()->local_id;
        $users=User::where('local_id',$id)->whereMonth('birthDate',9)->get([
            'name',
            'email',
            'photo_id',
            'birthDate',
            'mobileNumber1',
            'mobileNumber2',
            'id'
        ]);
        return view('members.monthly-birthday',compact('users','dates'));
    }


    public function october()
    {
        $dates='October';
        $id=Auth::user()->local_id;
        $users=User::where('local_id',$id)->whereMonth('birthDate',10)->get([
            'name',
            'email',
            'photo_id',
            'birthDate',
            'mobileNumber1',
            'mobileNumber2',
            'id'
        ]);
        return view('members.monthly-birthday',compact('users','dates'));
    }


    public function november()
    {
        $dates='November';
        $id=Auth::user()->local_id;
        $users=User::where('local_id',$id)->whereMonth('birthDate',11)->get([
            'name',
            'email',
            'photo_id',
            'birthDate',
            'mobileNumber1',
            'mobileNumber2',
            'id'
        ]);
        return view('members.monthly-birthday',compact('users','dates'));
    }

    public function december()
    {
        $dates='December';
        $id=Auth::user()->local_id;
        $users=User::where('local_id',$id)->whereMonth('birthDate',12)->get([
            'name',
            'email',
            'photo_id',
            'birthDate',
            'mobileNumber1',
            'mobileNumber2',
            'id'
        ]);
        return view('members.monthly-birthday',compact('users','dates'));
    }





    public function sunday()
    {
        $dates='Members Bone On Sunday';
        $id=Auth::user()->local_id;
        $us=User::where('local_id',$id)->get([
            'name',
            'email',
            'photo_id',
            'birthDate',
            'mobileNumber1',
            'mobileNumber2',
            'id'
        ]);
        $users=[];
        foreach ($us as $user){

            if (Carbon::parse($user->birthDate)->format('l')=='Sunday'){
                $users[]=$user;
            }

        }

        return view('members.monthly-birthday',compact('users','dates'));
    }

    public function monday()
    {
        $dates='Members Bone On Monday';
        $id=Auth::user()->local_id;
        $us=User::where('local_id',$id)->get([
            'name',
            'email',
            'photo_id',
            'birthDate',
            'mobileNumber1',
            'mobileNumber2',
            'id'
        ]);
        $users=[];
        foreach ($us as $user){

            if (Carbon::parse($user->birthDate)->format('l')=='Monday'){
                $users[]=$user;
            }

        }
        return view('members.monthly-birthday',compact('users','dates'));
    }


    public function tuesday()
    {
        $dates='Members Bone On Tuesday';
        $id=Auth::user()->local_id;
        $us=User::where('local_id',$id)->get([
            'name',
            'email',
            'photo_id',
            'birthDate',
            'mobileNumber1',
            'mobileNumber2',
            'id'
        ]);
        $users=[];
        foreach ($us as $user){

            if (Carbon::parse($user->birthDate)->format('l')=='Tuesday'){
                $users[]=$user;
            }

        }
        return view('members.monthly-birthday',compact('users','dates'));
    }

    public function wednesday()
    {
        $dates='Members Bone On Wednesday';
        $id=Auth::user()->local_id;
        $us=User::where('local_id',$id)->get([
            'name',
            'email',
            'photo_id',
            'birthDate',
            'mobileNumber1',
            'mobileNumber2',
            'id'
        ]);
        $users=[];
        foreach ($us as $user){

            if (Carbon::parse($user->birthDate)->format('l')=='Wednesday'){
                $users[]=$user;
            }

        }
        return view('members.monthly-birthday',compact('users','dates'));
    }

    public function thursday()
    {
        $dates='Members Bone On Thursday';
        $id=Auth::user()->local_id;
        $us=User::where('local_id',$id)->get([
            'name',
            'email',
            'photo_id',
            'birthDate',
            'mobileNumber1',
            'mobileNumber2',
            'id'
        ]);
        $users=[];
        foreach ($us as $user){

            if (Carbon::parse($user->birthDate)->format('l')=='Thursday'){
                $users[]=$user;
            }

        }
        return view('members.monthly-birthday',compact('users','dates'));
    }

    public function friday()
    {
        $dates='Members Bone On Friday';
        $id=Auth::user()->local_id;
        $us=User::where('local_id',$id)->get([
            'name',
            'email',
            'photo_id',
            'birthDate',
            'mobileNumber1',
            'mobileNumber2',
            'id'
        ]);
        $users=[];
        foreach ($us as $user){

            if (Carbon::parse($user->birthDate)->format('l')=='Friday'){
                $users[]=$user;
            }

        }
        return view('members.monthly-birthday',compact('users','dates'));
    }


    public function saturday()
    {
        $dates='Members Bone On Saturday';
        $id=Auth::user()->local_id;
        $us=User::where('local_id',$id)->get([
            'name',
            'email',
            'photo_id',
            'birthDate',
            'mobileNumber1',
            'mobileNumber2',
            'id'
        ]);
        $users=[];
        foreach ($us as $user){

            if (Carbon::parse($user->birthDate)->format('l')=='Saturday'){
                $users[]=$user;
            }

        }
        return view('members.monthly-birthday',compact('users','dates'));
    }




}
