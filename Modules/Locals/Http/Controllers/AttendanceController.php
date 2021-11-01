<?php

namespace Modules\Locals\Http\Controllers;

use App\Attendance;
use App\AttendanceCategory;
use App\AttendanceSubCategory;
use App\Exports\Attendances;
use App\Exports\titheExportView;
use App\Http\Controllers\Controller;
use App\Http\Requests\attendanceRequest;
use App\PostTithe;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceController extends Controller
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

    public function index()
    {
//        ++++++
//        +++++
//        +++ministryDeptalLeaders+presbyters'


            $id=Auth::user()->local_id;
           $attendanceCategory=AttendanceCategory::where('name','Sunday Service')->pluck('id')->first();
           $totalSunday=Attendance::where('attendance_categories_id',$attendanceCategory);



           $totalMinisters=$totalSunday->sum('ministers');
           $totalElders=$totalSunday->sum('elders');
           $totalDeacon=$totalSunday->sum('deacon');
           $totalDeaconess=$totalSunday->sum('deaconess');
           $totalMale=$totalSunday->sum('male');
           $totalFemale=$totalSunday->sum('female');
           $totalChildren=$totalSunday->sum('children');
           $totalVisitors=$totalSunday->sum('visitors');

        $totaljYouthMinistry=$totalSunday->sum('jYouthMinistry');
        $totalsYouthMinistry=$totalSunday->sum('sYouthMinistry');
        $totalwomensMinistry=$totalSunday->sum('womensMinistry');
        $totalmensMinistry=$totalSunday->sum('mensMinistry');
        $totalmembersAttendingCellGroup=$totalSunday->sum('membersAttendingCellGroup');
        $totalwednesdayTeaching=$totalSunday->sum('wednesdayTeaching');
        $totalfridayTeaching=$totalSunday->sum('fridayTeaching');
        $totaladultSundaySchool=$totalSunday->sum('adultSundaySchool');
        $totaladultMaleAtWeekendService=$totalSunday->sum('adultMaleAtWeekendService');
        $totaladultFemaleAtWeekendService=$totalSunday->sum('adultFemaleAtWeekendService');
        $totalguestsVisitors=$totalSunday->sum('guestsVisitors');
        $totalvolunteersforweekendservice=$totalSunday->sum('volunteersforweekendservice');
        $totalpreBaptismalClass=$totalSunday->sum('preBaptismalClass');
        $totalpostBaptismalClass=$totalSunday->sum('postBaptismalClass');
        $totalministryDeptalLeaders=$totalSunday->sum('ministryDeptalLeaders');
        $totalpresbyters=$totalSunday->sum('presbyters');


        $totalMinistersc=$totalSunday->sum('ministers');
        $totalEldersc=$totalSunday->sum('elders');
        $totalDeaconc=$totalSunday->sum('deacon');
        $totalDeaconessc=$totalSunday->sum('deaconess');
        $totalMalec=$totalSunday->sum('male');
        $totalFemalec=$totalSunday->sum('female');
        $totalChildrenc=$totalSunday->sum('children');
        $totalVisitorsc=$totalSunday->sum('visitors');

        $totaljYouthMinistryc=$totalSunday->count('jYouthMinistry');
        $totalsYouthMinistryc=$totalSunday->count('sYouthMinistry');
        $totalwomensMinistryc=$totalSunday->count('womensMinistry');
        $totalmensMinistryc=$totalSunday->count('mensMinistry');
        $totalmembersAttendingCellGroupc=$totalSunday->count('membersAttendingCellGroup');
        $totalwednesdayTeachingc=$totalSunday->count('wednesdayTeaching');
        $totalfridayTeachingc=$totalSunday->count('fridayTeaching');
        $totaladultSundaySchoolc=$totalSunday->count('adultSundaySchool');
        $totaladultMaleAtWeekendServicec=$totalSunday->count('adultMaleAtWeekendService');
        $totaladultFemaleAtWeekendServicec=$totalSunday->count('adultFemaleAtWeekendService');
        $totalguestsVisitorsc=$totalSunday->count('guestsVisitors');
        $totalvolunteersforweekendservicec=$totalSunday->count('volunteersforweekendservice');
        $totalpreBaptismalClassc=$totalSunday->count('preBaptismalClass');
        $totalpostBaptismalClassc=$totalSunday->count('postBaptismalClass');
        $totalministryDeptalLeadersc=$totalSunday->count('ministryDeptalLeaders');
        $totalpresbytersc=$totalSunday->count('presbyters');

        $totalForSundayc=$totalMinistersc+$totalEldersc+$totalDeaconc+$totalDeaconessc+$totalMalec+$totalFemalec+$totalChildrenc+$totalVisitorsc+
        $totaljYouthMinistryc+$totalsYouthMinistryc+$totalwomensMinistryc+$totalmensMinistryc+
        $totalmembersAttendingCellGroupc+$totalwednesdayTeachingc+$totalfridayTeachingc+
        $totaladultSundaySchoolc+$totaladultMaleAtWeekendServicec+$totaladultFemaleAtWeekendServicec+
        $totalguestsVisitorsc+$totalvolunteersforweekendservicec+$totalpreBaptismalClassc+$totalpostBaptismalClassc+
        $totalministryDeptalLeadersc+$totalpresbytersc;


       $totalForSunday=$totalMinisters+$totalElders+$totalDeacon+$totalDeaconess+$totalMale+$totalFemale+$totalChildren+$totalVisitors+
       $totaljYouthMinistry+$totalsYouthMinistry+$totalwomensMinistry+$totalmensMinistry+
       $totalmembersAttendingCellGroup+$totalwednesdayTeaching+$totalfridayTeaching+
       $totaladultSundaySchool+$totaladultMaleAtWeekendService+$totaladultFemaleAtWeekendService+
       $totalguestsVisitors+$totalvolunteersforweekendservice+$totalpreBaptismalClass+$totalpostBaptismalClass+
       $totalministryDeptalLeaders+$totalpresbyters;




       $totalAdult=$totalMinisters+$totalElders+$totalDeacon+$totalDeaconess+$totalMale+$totalFemale;



        //total average attendance for adult
        $totalAverageAttendance= $totalForSunday/$totalForSundayc;

       //gender ratio
       $genderRatio= $totalFemale/$totalMale;


       //gust membership ratio / total adult membership
        $totalGuestMembershipRatio=$totalguestsVisitorsc/($totalMale+$totalFemale);

        //total guest attendance ratio
        $totalGuestAttendanceRatio=$totalguestsVisitorsc/$totalAverageAttendance;


        //adult sunday school attendance
        $totalSundaySchoolRatio=($totaladultSundaySchool/$totaladultSundaySchoolc)/($totalMale+$totalFemale);

        //cell group attending ratio
        $totalCellGroupRatio=$totalmembersAttendingCellGroup/($totalMale+$totalFemale);


        //total guest retain /total guest received **************
        $totalGuestRetained=$totalguestsVisitors;


        //total volunteer involvement
        $totalVolunteerInvolment=$totalvolunteersforweekendservicec/$totalvolunteersforweekendservice;

        //total volunteer attendance ration
        $totalVolunteerAttendanceRatio=$totalvolunteersforweekendservice/$totalAverageAttendance;

        //sheep shepherd ratio

        $totalShepherdRatio=($totalMale+$totalFemale)/$totalMinisters;


        //total tithe paid within a year
        $totalTithe=PostTithe::where('local_id',Auth::user()->local_id)->pluck('amount')->sum();



        $totalOfferingPerCapitalTithe=$totalTithe/$totalAverageAttendance;

        return view('attendance.index',compact('id','totalAverageAttendance','genderRatio','totalGuestMembershipRatio',
        'totalGuestAttendanceRatio','totalSundaySchoolRatio','totalCellGroupRatio','totalGuestRetained','totalVolunteerInvolment',
        'totalVolunteerAttendanceRatio','totalShepherdRatio','totalOfferingPerCapitalTithe'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $id=Auth::user()->local_id;
        $attendanceCate=AttendanceCategory::where('local_id',$id)->orwhere('local_id',null)->pluck('name','id');
        $attendanceSub=AttendanceSubCategory::pluck('name','id');
        return view('attendance.create',compact('id','attendanceCate','attendanceSub'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //checking the attendance of people in a particular local
        Attendance::create($request->all());

        return redirect()->back()->with(['success'=>'Successfully Posted']);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function show($id)
    {
      return  Excel::download(new titheExportView(request('id')),     'the.xlsx');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        try {
          $local_id=Auth::user()->local_id;
          $attendance=Attendance::where('id',$id)->where('local_id',$local_id)->firstOrFail();

        }catch (ModelNotFoundException $exception){

            return back()->withError('Attendance not found by ID ' . $id)->withInput();
        }
          return  view('attendance.edit',compact('attendance','local_id'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(attendanceRequest $request, $id)
    {
        $local_id=Auth::user()->local_id;
        $id=$request['ids'];
        $attendance=Attendance::where('id',$id)->where('local_id',$local_id)->firstOrFail();

        $attendance->update($request->all());

        return redirect()->route('attendance.index')->with(['success'=>'Successfully Updated Attendance']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {

            $local_id=Auth::user()->local_id;
            Attendance::where('id',$id)->where('local_id',$local_id)->delete();

        }catch (ModelNotFoundException $exception){

            return back()->withError('Attendance not found by ID ' . $id)->withInput();
        }

        return  redirect()->route('dailyAttendance')->with(['success'=>'Successfully deleted']);
    }
}
