<?php

namespace Modules\Locals\Http\Controllers;

use App\Area;
use App\AuditTrail;
use App\District;
use App\Http\Controllers\Controller;
use App\Http\Requests\TextRequest;
use App\Http\Requests\UserUpdateRequest;
use App\LanguagesInGhana;
use App\Locals;
use App\Photo;
use App\Region;
use App\Role;
use App\TextField;
use App\Transfer;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TextFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //chating with admins online
        $id=Auth::user()->local_id;
        $users=TextField::orderBy('created_at','desc')->paginate(50);
        return view('members.TextField.index',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TextRequest $request)
    {
        //storing members who has been transfer
        TextField::create($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
            $user=User::where('id',$id)->where('local_id',Auth::user()->local_id)->firstOrFail();
            $locals=Locals::where('id',Auth::user()->local_id)->pluck('name','id')->all();
            $districts=District::where('id',Auth::user()->district_id)->pluck('name','id')->all();
            $areas=Area::where('id',Auth::user()->area_id)->pluck('name','id')->all();
            $regions=Region::where('id',Auth::user()->region_id)->pluck('name','id')->all();
            $roles = Role::where('id',5)->pluck('name','id')->all();
            $languages= LanguagesInGhana::GetLatest();
            $home_regions=Region::orderBy('name','ASC')->pluck('name','name')->all();
            $Adminsroles=Role::whereId(5)->pluck('name','id')->all();;

        }catch (ModelNotFoundException $exception){
            return back()->withError('User not found by ID ' . $id)->withInput();
        }
        return view('locals.transfer.edit',compact('user',
            'Adminsroles','home_regions','languages','roles','locals','districts','regions','areas'));

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
            $local_id=Auth::user()->local_id;
            $user=User::where('id',$request['user_id'])->where('local_id',$local_id)->firstOrFail();

            $id=trim(Auth::user()->local->local_code.$request['members_id']);

            $users=User::where('members_id',$id)->where('local_id',Auth::user()->local_id)->count();

            if ($users==null) {

                $idd = trim(Auth::user()->local->local_code . $request['members_id']);

                if (($request['password'] == "")) {

                    if (trim($request->password) == null) {

                        $input = $request->except('password');

                    } else {
                        $input = $request->all();

                    }
                    if ($file = $request->file('photo_id')) {

                        $name = time() . $file->getClientOriginalName();

                        $file->move('images/', $name);

                        $photo = Photo::create(['file' => $name]);

                        $input['photo_id'] = $photo->id;
                    }

                    $input['members_id'] = $idd;


                    $transferHistory = new Transfer();
                    $transferHistory->local_id = $request['transferLocal'];
                    $transferHistory->district_id = $request['transferDistrict'];
                    $transferHistory->area_id = $request['transferArea'];
                    $transferHistory->user_id = $request['user_id'];
                    $transferHistory->to_local= Auth::user()->local_id;
                    $transferHistory->save();

                    $audit = new AuditTrail();
                    $audit->local_id = Auth::user()->local_id;
                    $audit->category = $request['name'] . ' ' . '/Updated';
                    $audit->user_id = Auth::user()->id;
                    $audit->save();

                    $user->update($input);

                } elseif ($request['password'] != "") {

                    $input = $request->all();

                    if ($file = $request->file('photo_id')) {
                        $name = time() . $file->getClientOriginalName();
                        $file->move('images/', $name);
                        $photo = Photo::create(['file' => $name]);
                        $input['photo_id'] = $photo->id;
                    }
                    $input['password'] = bcrypt($request->password);
                    $input['members_id'] = $idd;

                    $transferHistory = new Transfer();
                    $transferHistory->local_id = $request['transferLocal'];
                    $transferHistory->district_id = $request['transferDistrict'];
                    $transferHistory->area_id = $request['transferArea'];
                    $transferHistory->user_id = $request['user_id'];
                    $transferHistory->to_local= Auth::user()->local_id;
                    $transferHistory->save();

                    $audit = new AuditTrail();
                    $audit->local_id = Auth::user()->local_id;
                    $audit->category = $request['name'] . ' ' . '/Updated';
                    $audit->user_id = Auth::user()->id;
                    $audit->save();

                    $user->update($input);
                }
            }else {
                return back()->withError('Member by ID ' . $id .' Already Exist')->withInput();
            }

        }catch (ModelNotFoundException $exception){

            return back()->withError('User not found by ID ' . $id)->withInput();
        }

        return redirect()->route('transferLocal')->with(['success' => 'Successfully Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
