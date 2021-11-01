<?php

namespace Modules\Locals\Http\Controllers;

use App\AuditTrail;
use App\Country;
use App\Currency;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UserUpdateRequest;

use App\Models\Area;
use App\Models\District;
use App\Models\LanguagesInGhana;
use App\Models\Locals;
use App\Models\Region;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RegisterLocalMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public  function __construct()
    {
        date_default_timezone_set("Africa/Accra");
    }

    public function index(Request $request)
    {
//        $u=Auth::user();
//        $permission=Permission::findById(1);
//        if ($u->can('edit post')){
            $countUsers=null;
            $id = Auth::user()->local_id;
            $localName =Locals::findOrFail($id);

            $users=User::select('id','members_id','photo_id','name','mobileNumber1','gender','officeHeld','birthDate','datejoinchurch','is_active')->where('local_id', $id)->whereIn('role_id',[1,2,3,4,5])
                ->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
                ->where('is_active', 1)->where('officeHeld','!=','children ministry')->orwhere('officeHeld',null)->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
                ->where('local_id', $id)->whereIn('role_id',[1,2,3,4,5])
                ->GetLatest();

            $usersCount =User::where('local_id', $id)->whereIn('role_id',[1,2,3,4,5])
                ->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
                ->where('is_active', 1)->where('officeHeld','!=','children ministry')->orwhere('officeHeld',null) ->where('members_id','LIKE','%'.Auth::user()->local->local_code.'%')
                ->where('local_id', $id)->whereIn('role_id',[1,2,3,4,5])
                ->count();
            $countUsers=$usersCount;
            return view('locals.index',compact('localName','users', 'countUsers'));
//        }else{
//            return  redirect()->back()->withErrors(['sorry you dont have permission']);
//        }




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        try{
            $district_id=Auth::user()->district_id;
            $region_id=Auth::user()->region_id;
            $area_id=Auth::user()->area_id;
            $local_id=Auth::user()->local_id;
            $locals=Locals::where('id',$local_id)->pluck('name','id');
            $districts=District::where('id',$district_id)->pluck('name','id');
            $areas=Area::where('id',$area_id)->pluck('name','id')->all();
            $regions=Region::where('id',$region_id)->pluck('name','id');
            $roles = Role::where('id',5)->pluck('name','id')->all();
            $membership=Locals::where('id',$local_id)->pluck('local_code');
            foreach ($membership as $membershipId) {
                $membershipId;
            }
            $languages= LanguagesInGhana::GetLatest();
            $home_regions=Region::orderBy('name','ASC')->pluck('name','name')->all();
        }catch (ModelNotFoundException $exception){
            return back()->withError('Sorry Local not found' .$local_id)->withInput();
        }
        return view('locals::locals.create',compact('home_regions','locals', 'districts','languages',
            'membershipId','areas','regions','region_id', 'areas','regions','roles','home_regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UsersRequest $request)
    {
        $id=trim(Auth::user()->local->local_code.$request['members_id']);
        $user=User::where('members_id',$id)->where('local_id',Auth::user()->local_id)->count();
        if ($user==null){
            $input = $request->all();
            if ($file = $request->file('photo_id')) {
                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);
                $photo = Photo::create(['file' => $name]);
                $input['photo_id'] = $photo->id;
            }
            $input['password'] = bcrypt($request->password);
            $input['members_id'] = Auth::user()->local->local_code . $request->members_id;
            User::create($input);
            $audit = new AuditTrail();
            $audit->local_id = Auth::user()->local_id;
            $audit->category = 'Registered' . '/' . $request['name'];
            $audit->user_id = Auth::user()->id;
            $audit->save();
        }else {
            return back()->withError('Member by ID ' . $id .'Already Exist By The User'. $user->name)->withInput();
        }
        return redirect()->back()->with(['success' => 'Successfully created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        try {
            // $id=Crypt::decrypt($id);
            $district_id=Auth::user()->district_id;
            $region_id=Auth::user()->region_id;
            $area_id=Auth::user()->area_id;
            $local_id=Auth::user()->local_id;
            $user=User::where('id',$id)->where('local_id',$local_id)->firstOrFail();
            $locals=Locals::where('id',$local_id)->pluck('name','id');
            $districts=District::where('id',$district_id)->pluck('name','id');
            $areas=Area::where('id',$area_id)->pluck('name','id')->all();
            $regions=Region::where('id',$region_id)->pluck('name','id');
            $roles = Role::where('id',$user->role_id)->pluck('name','id');
            $languages= LanguagesInGhana::latest();
            $home_regions=Region::orderBy('name','ASC')->pluck('name','name')->all();
        }catch (ModelNotFoundException $exception){
            return back()->withError('User not found by ID ' . $id)->withInput();
        }
//        toast('Hello'.$user->name,'success');
        return view('locals.show',compact('user','home_regions','languages','roles','locals','districts','regions','areas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        try{
            // $id=Crypt::decrypt($id);
            $district_id=Auth::user()->district_id;
            $region_id=Auth::user()->region_id;
            $area_id=Auth::user()->area_id;
            $local_id=Auth::user()->local_id;
            $user=User::where('id',$id)->where('local_id',$local_id)->firstOrFail();
            $locals=Locals::where('id',$local_id)->pluck('name','id');
            $districts=District::where('id',$district_id)->pluck('name','id');
            $areas=Area::where('id',$area_id)->pluck('name','id')->all();
            $regions=Region::where('id',$region_id)->pluck('name','id');
            $roles = Role::whereIn('id',[5])->pluck('name','id')->all();
            $languages= LanguagesInGhana::GetLatest();
            $home_regions=Region::orderBy('name','ASC')->pluck('name','name')->all();
            $Adminsroles=Role::pluck('name','id');
            $specialAdmins=Role::whereIn('id',[10,11,12])->pluck('name','id');
        }catch (ModelNotFoundException $exception){
            return back()->withError('User not found by ID ' . $id)->withInput();
        }
//        toast('You\'re about to make changes to '.$user->name . ' Profile','success');
        return view('locals.edit',compact('specialAdmins','user','Adminsroles','home_regions','languages','roles','locals','districts','regions','areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserUpdateRequest $request, $id)
    {
        try{
            // $id=Crypt::decrypt($id);
            $local_id=Auth::user()->local_id;
            $user=User::where('id',$id)->where('local_id',$local_id)->firstOrFail();
            $localCode=Locals::where('id',$request['local_id'])->pluck('local_code')->first();
            $members_id=trim($localCode.$request['members_id']);
            if ((trim($request->password)==null)){
                $input = $request->all();
                if (trim($request->password) ==null){
                    $input = $request->except('password');
                }
                if ($file = $request->file('photo_id')) {
                    $name = time() . $file->getClientOriginalName();
                    $file->move('images/', $name);
                    $photo = Photo::create(['file' => $name]);
                    $input['photo_id'] = $photo->id;
                }
                $input['members_id']=$members_id;
                $user->update($input);
                $audit=new AuditTrail();
                $audit->local_id=Auth::user()->local_id;
                $audit->category=$request['name'].' '. '/Updated';
                $audit->user_id=Auth::user()->id;
                $audit->save();
            }elseif ($request['password'] !=""){
                $input = $request->all();
                if ($file = $request->file('photo_id')){
                    $name = time() . $file->getClientOriginalName();
                    $file->move('images/', $name);
                    $photo = Photo::create(['file' => $name]);
                    $input['photo_id'] = $photo->id;
                }
                $input['password'] = bcrypt($request->password);
                $input['members_id']=$members_id;
                $user->update($input);
                $audit=new AuditTrail();
                $audit->local_id=Auth::user()->local_id;
                $audit->category=$request['name'] .' '. '/Updated';
                $audit->user_id=Auth::user()->id;
                $audit->save();
            }
        }catch (ModelNotFoundException $exception){
            return back()->withError('User not found by ID ' . $id)->withInput();
        }
        return redirect()->route('registration.index')->with(['success1'=>'Successfully Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try{
            // $id=Crypt::decrypt($id);
            $user=User::where('id',$id)->where('local_id',Auth::user()->local_id)->firstOrFail();
            PostTithe::where('user_id',$id)->where('local_id',Auth::user()->local_id)->delete();
            if (!empty($user->photo)) {
                if (file_exists($user->photo->file)) {
                    unlink(public_path() . $user->photo->file);
                }
            }

            $user->delete();
            $audit=new AuditTrail();

            $audit->local_id=Auth::user()->local_id;
            $audit->category=$user->name.' '. '/Deleted';
            $audit->user_id=Auth::user()->id;
            $audit->save();
        }catch (ModelNotFoundException $exception){

            return back()->withError('User not found by ID ' . $id)->withInput();
        }

        return redirect()->back()->with(['success'=>'Successfully Deleted including tithe records']);
    }
}
