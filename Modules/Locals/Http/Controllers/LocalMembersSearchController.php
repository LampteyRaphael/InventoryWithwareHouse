<?php
namespace Modules\Locals\Http\Controllers;

use App\Exports\ChildrenFromView;
use App\Exports\UsersFromView;
use App\Http\Controllers\Controller;
use App\Locals;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class LocalMembersSearchController extends Controller
{
    public function store(Request $request){

        $countUserss=[];
        $countUsers=null;
        $males=[];
        $females=[];
        $deacons=[];
        $deaconesss=[];
        $deacon=null;
        $deaconess=null;
        $female=null;
        $male=null;
        $elders=[];
        $elder=null;
        //showing a particular local members
        $id=Auth::user()->local_id;
        $search=$request['search'];

        $localName=Locals::findOrFail($id);
        $users=User::select('id','members_id','photo_id','name','mobileNumber1','gender','officeHeld','birthDate','datejoinchurch')->where('local_id',$id)->where('name','LIKE','%'.$request['search'].'%')->where('is_active',1)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','!=','children ministry')
            ->orwhere('members_id','LIKE','%'.$request['search'].'%')->where('local_id',$id)->where('is_active',1)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','!=','children ministry')
            ->orwhere('email','LIKE','%'.$request['search'].'%')->where('local_id',$id)->where('is_active',1)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','!=','children ministry')
            ->orwhere('gender','LIKE','%'.$request['search'].'%')->where('local_id',$id)->where('is_active',1)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','!=','children ministry')
            ->orwhere('birthDate','LIKE','%'.$request['search'].'%')->where('local_id',$id)->where('is_active',1)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','!=','children ministry')
            ->orwhere('mobileNumber1','LIKE','%'.$request['search'].'%')->where('local_id',$id)->where('is_active',1)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','!=','children ministry')
            ->orwhere('mobileNumber2','LIKE','%'.$request['search'].'%')->where('local_id',$id)->where('is_active',1)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','!=','children ministry')
            ->orwhere('workNumber','LIKE','%'.$request['search'].'%')->where('local_id',$id)->where('is_active',1)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','!=','children ministry')
            ->orwhere('whatsappNumber','LIKE','%'.$request['search'].'%')->where('local_id',$id)->where('is_active',1)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','!=','children ministry')
            ->orwhere('position','LIKE','%'.$request['search'].'%')->where('local_id',$id)->where('is_active',1)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','!=','children ministry')
            ->orwhere('languagess','LIKE','%'.$request['search'].'%')->where('local_id',$id)->where('is_active',1)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','!=','children ministry')
            ->orwhere('officeHeld','LIKE','%'.$request['search'].'%')->where('local_id',$id)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','!=','children ministry')
            ->where('is_active',1)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','!=','children ministry')
            ->GetLatest();

    Session(['search'=>$search]);

        $usersCount = User::where('local_id', $id)->whereIn('role_id',[1,2,3,4,5])
            ->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','!=','children ministry')
            ->get(['id','gender','officeHeld']);

        foreach ($usersCount as $user){

            if ($user){
                $countUserss[]=$user->id;
                $countUsers=count($countUserss);
            }

            if($user->gender ==='male'){
                $males[]=$user->gender;
                $male=count($males);
            }

            if($user->gender ==='female'){
                $females[]=$user->gender;
                $female=count($females);
            }

            if($user->officeHeld ==='deacon'){
                $deacons[]=$user->gender;
                $deacon=count($deacons);
            }

            if($user->officeHeld ==='deaconess'){
                $deaconesss[]=$user->gender;
                $deaconess=count($deaconesss);
            }

            if($user->officeHeld ==='elder'){
                $elders[]=$user->gender;
                $elder=count($elders);
            }

        }

        return view('locals.index',compact('users','localName','countUsers','male','female','deacon',
            'deaconess','elder','search'));
    }

    public function childrenSearch(Request $request){

        $countUserss=[];
        $countUsers=null;
        $males=[];
        $females=[];

        $female=null;
        $male=null;

        $id=Auth::user()->local_id;
        $localName=Locals::findOrFail($id);
        $users=User::select('id','members_id','photo_id','name','gender','role_id','officeHeld','datejoinchurch','birthDate','mothers_name','fathers_name')->where('local_id',$id)->where('name','LIKE','%'.$request['search'].'%')
            ->where('is_active',1)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','=','children ministry')
            ->orwhere('members_id','LIKE','%'.$request['search'].'%')->where('local_id',$id)->where('is_active',1)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','=','children ministry')
            ->orwhere('email','LIKE','%'.$request['search'].'%')->where('local_id',$id)->where('is_active',1)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','=','children ministry')
            ->orwhere('gender','LIKE','%'.$request['search'].'%')->where('local_id',$id)->where('is_active',1)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','=','children ministry')
            ->orwhere('birthDate','LIKE','%'.$request['search'].'%')->where('local_id',$id)->where('is_active',1)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','=','children ministry')
            ->orwhere('mobileNumber1','LIKE','%'.$request['search'].'%')->where('local_id',$id)->where('is_active',1)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','=','children ministry')
            ->orwhere('mobileNumber2','LIKE','%'.$request['search'].'%')->where('local_id',$id)->where('is_active',1)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','=','children ministry')
            ->orwhere('workNumber','LIKE','%'.$request['search'].'%')->where('local_id',$id)->where('is_active',1)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','=','children ministry')
            ->orwhere('whatsappNumber','LIKE','%'.$request['search'].'%')->where('local_id',$id)->where('is_active',1)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','=','children ministry')
            ->orwhere('position','LIKE','%'.$request['search'].'%')->where('local_id',$id)->where('is_active',1)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','=','children ministry')
            ->orwhere('languagess','LIKE','%'.$request['search'].'%')->where('local_id',$id)->where('is_active',1)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','=','children ministry')
            ->orwhere('officeHeld','LIKE','%'.$request['search'].'%')->where('local_id',$id)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','=','children ministry')
            ->where('is_active',1)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','=','children ministry')
            ->GetLatest();


        $usersCount = User::where('local_id', $id)->whereIn('role_id',[1,2,3,4,5])
            ->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
            ->where('is_active', 1)->where('officeHeld','=','children ministry')
            ->get(['id','gender','officeHeld']);

        foreach ($usersCount as $user){

            if ($user){
                $countUserss[]=$user->id;
                $countUsers=count($countUserss);
            }

            if($user->gender ==='male'){
                $males[]=$user->gender;
                $male=count($males);
            }

            if($user->gender ==='female'){
                $females[]=$user->gender;
                $female=count($females);
            }

        }

        return view('locals.children.index',compact('users','countUsers','male','female','localName'));
    }


    public function storeExcel()
    {
        return Excel::download(new UsersFromView,     'Members.xlsx');
    }

    public function childrenExcel(){

        return Excel::download(new ChildrenFromView,     'Members.xlsx');
    }

}
