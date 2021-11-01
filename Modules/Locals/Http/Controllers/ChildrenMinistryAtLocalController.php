<?php
namespace Modules\Locals\Http\Controllers;

use App\Area;
use App\AuditTrail;
use App\ChildrenParents;
use App\District;
use App\Http\Controllers\Controller;
use App\Http\Requests\localChildrenRegisterRequest;
use App\Http\Requests\localChildrenRequest;
use App\LanguagesInGhana;
use App\Locals;
use App\Photo;
use App\Region;
use App\Role;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChildrenMinistryAtLocalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return false|string
     */
    public function index()
    {
        $countUserss=[];
        $countUsers=null;
        $males=[];
        $females=[];
        $female=null;
        $male=null;
        $id = Auth::user()->local_id;
        $users = User::select('local_id','id','members_id','photo_id','name','gender','role_id','officeHeld','datejoinchurch','birthDate','mothers_name','fathers_name','mobileNumber1')->where('local_id', $id)->whereIn('role_id',[1,2,3,4,5])
            ->where('is_active', 1)
            ->where('officeHeld','=','children ministry')
            ->GetLatest();
        $parents=User::where('local_id',$id)->where('officeHeld','!=','children ministry')->pluck('name','id')->all();

//        $parents =User::where('local_id', $id)->whereIn('role_id',[1,2,3,4,5])->where('is_active', 1)->where('officeHeld','!=','children ministry')->get('id');
        foreach ($users as $user){
            if($user->gender ==='male'){
                $males[]=$user->gender;
                $male=count($males);
            }
            if($user->gender ==='female'){
                $females[]=$user->gender;
                $female=count($females);
            }
            if ($user){
                $countUserss[]=$user->id;
                $countUsers=count($countUserss);
            }
        }
        return view('locals.children.index',compact('users','countUsers','male','female','parents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
//        try{
            //registering of church members
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
            $parents=User::where('local_id',$local_id)->where('officeHeld','!=','children ministry')->pluck('name','id')->all();

//        }catch (ModelNotFoundException $exception){
//
//            return back()->withError('Sorry Local not found' .$local_id)->withInput();
//        }
        return view('locals.children.create',compact('home_regions','locals', 'districts','languages',
            'membershipId','areas','regions','region_id', 'areas','regions','roles','home_regions','parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(localChildrenRegisterRequest $request)
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
            $input['members_id'] = Auth::user()->local->local_code.$request->members_id;
            $childId=  User::create($input);
            if (!empty($input['parentGuardianName2'])){
                ChildrenParents::create(['user_id'=>$childId->id,'parent_id'=>$request->parentGuardianName2]);
            }else{
                ChildrenParents::create(['user_id'=>$childId->id,'name'=>$request->parentGuardianName]);
            }
            $audit = new AuditTrail();
            $audit->local_id = Auth::user()->local_id;
            $audit->category = 'Registered/Child/ministry '.'/' .$request['name'];
            $audit->user_id = Auth::user()->id;
            $audit->save();
        }else{
            return back()->withError('Member by ID ' . $id .' Already Exist')->withInput();
        }
        return redirect()->back()->with(['success' => 'Successfully created']);
    }

        public function store2(Request $request){

        return  $request->all();
            return redirect()->back()->with(['success' => 'Successfully created']);

        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        try {

            $user=User::findOrFail($id);
            $district_id=Auth::user()->district_id;
            $region_id=Auth::user()->region_id;
            $area_id=Auth::user()->area_id;
            $local_id=Auth::user()->local_id;

            $locals=Locals::where('id',$local_id)->pluck('name','id');
            $districts=District::where('id',$district_id)->pluck('name','id');

            $areas=Area::where('id',$area_id)->pluck('name','id')->all();
            $regions=Region::where('id',$region_id)->pluck('name','id');
            $roles = Role::where('id',$user->role_id)->pluck('name','id');

            $languages= LanguagesInGhana::GetLatest();

            $home_regions=Region::orderBy('name','ASC')->pluck('name','name')->all();
        }catch (ModelNotFoundException $exception){

            return back()->withError('User not found by ID ' . $id)->withInput();
        }
        return view('locals.children.show',compact('user','home_regions','languages','roles','locals','districts','regions','areas'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        try{
            $user=User::findOrFail($id);

            $district_id=Auth::user()->district_id;
            $region_id=Auth::user()->region_id;
            $area_id=Auth::user()->area_id;
            $local_id=Auth::user()->local_id;

            $locals=Locals::where('id',$local_id)->pluck('name','id');
            $districts=District::where('id',$district_id)->pluck('name','id');

            $areas=Area::where('id',$area_id)->pluck('name','id')->all();
            $regions=Region::where('id',$region_id)->pluck('name','id');
            $roles = Role::whereIn('id',[5])->pluck('name','id');

            $languages= LanguagesInGhana::GetLatest();
            $parents=User::where('local_id',$local_id)->where('officeHeld','!=','children ministry')->pluck('name','id')->all();
            $home_regions=Region::orderBy('name','ASC')->pluck('name','name')->all();
            $Adminsroles=Role::pluck('name','id');

            $childrenParent=User::where('id',ChildrenParents::where('user_id',$id)->pluck('parent_id')->first())->pluck('name')->first();
            if (!empty($childrenParent)){
               $childrenParent2=$childrenParent;
            }else{
                $childrenParent2= ChildrenParents::where('user_id',$id)->pluck('name')->first();
            }
        }catch (ModelNotFoundException $exception){

            return back()->withError('User not found by ID ' . $id)->withInput();
        }
        return view('locals.children.edit',compact('user','Adminsroles','home_regions',
            'languages','roles','locals','districts','regions','areas','parents','childrenParent2'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(localChildrenRequest $request, $id)
    {
        try{
            $local_id=Auth::user()->local_id;
            $user=User::where('id',$id)->where('local_id',$local_id)->firstOrFail();
            $parentInput11=ChildrenParents::where('user_id',$id)->count();

              if ($parentInput11==1){
                      $parentInput=ChildrenParents::where('user_id',$id)->firstOrFail();
              }else{
                  $parentInput=new ChildrenParents();
              }

            $idd=trim(Auth::user()->local->local_code.$request['members_id']);
            if (($request['password']=="")){
                if (trim($request->password) ==null){
                    $input = $request->except('password');
                }else {
                    $input = $request->all();
                }
                if ($file = $request->file('photo_id')) {
                    $name = time() . $file->getClientOriginalName();
                    $file->move('images/', $name);
                    $photo = Photo::create(['file' => $name]);
                    $input['photo_id'] = $photo->id;
                }
                $input['members_id']=$idd;
                $childId= $user->update($input);

                if ($parentInput11==0){
                    if (!empty($input['parentGuardianName2'])){
                        ChildrenParents::create(['user_id'=>$id,'parent_id'=>$request->parentGuardianName2]);
                    }else{
                        ChildrenParents::create(['user_id'=>$id,'name'=>$request->parentGuardianName]);
                    }
                }else{
                    if (!empty($input['parentGuardianName2'])){
                        $parentInput->parent_id=$request->parentGuardianName2;
                        $parentInput->update();
                    }else{
                        $parentInput->name=$request->parentGuardianName;
                        $parentInput->update();
                    }
                }
                $audit=new AuditTrail();
                $audit->local_id=Auth::user()->local_id;
                $audit->category=$request['name'].' '. '/children ministry/Updated';
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
                $input['members_id']=$idd;
                $user->update($input);

                if ($parentInput11==0){
                    if (!empty($input['parentGuardianName2'])){
                        ChildrenParents::create(['user_id'=>$id,'parent_id'=>$request->parentGuardianName2]);
                    }else{
                        ChildrenParents::create(['user_id'=>$id,'name'=>$request->parentGuardianName]);
                    }
                }else{
                    if (!empty($input['parentGuardianName2'])){
                        $parentInput->parent_id=$request->parentGuardianName2;
                        $parentInput->update();
                    }else{
                        $parentInput->name=$request->parentGuardianName;
                        $parentInput->update();
                    }
                }
                $audit=new AuditTrail();
                $audit->local_id=Auth::user()->local_id;
                $audit->category=$request['name'] .' '. '/children ministry/Updated';
                $audit->user_id=Auth::user()->id;
                $audit->save();
            }
        }catch (ModelNotFoundException $exception){
            return back()->withError('User not found by ID ' . $id)->withInput();
        }
        return redirect()->route('ministry.index')->with(['success' => 'Successfully Updated']);

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
            $user = User::findOrFail($id);
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

        return redirect()->route('ministry.index')->with(['success'=>'Successfully Deleted']);
    }
}
