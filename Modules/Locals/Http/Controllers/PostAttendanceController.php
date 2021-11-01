<?php
namespace Modules\Locals\Http\Controllers;

use App\Attendance;
use App\AttendanceCategory;
use App\AttendanceSubCategory;
use App\Exports\Attendances;
use App\Exports\DailyAttendanceExcel;
use App\Http\Controllers\Controller;
use App\Http\Requests\attendanceRequest;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DatePeriod;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PostAttendanceController extends Controller
{
    public  function __construct()
    {
        date_default_timezone_set("Africa/Accra");
    }

    public function attendExcel(){

        return  Excel::download(new Attendances,     'attendance.xlsx');
    }

    public function attendance(Request $request){
         AttendanceCategory::create($request->all());
        return  redirect()->back()->with(['success'=>'Successfully Created']);
    }

    public function dailyAttendance(){
        $attendanceCategorys=Attendance::where('local_id',Auth::user()->local_id)->get();
        $att =$attendanceCategorys->where('attendance_sub_categories_id',1);
        $att2 =$attendanceCategorys->where('attendance_sub_categories_id',2);
        $att3 =$attendanceCategorys->where('attendance_sub_categories_id',3);
        $att4 =$attendanceCategorys->where('attendance_sub_categories_id',4);

//        $now = Carbon::now();
//        $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
//        $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');

//  return  Carbon::now()->weekOfMonth;

//     return   $dateS = Carbon::now()->subWeek()->toDateTimeString();
//        $dateE = Carbon::now()->startOfMonth();

      //  Carbon::parse("fifth Sunday of this month")->toDateString();

//        return $s= Carbon::parse('2021-03-01 00:00:00')->startOfMonth()->toDateTimeString();
//              $from=Carbon::now()->subDays(7)->toDateString();
//              $current=Carbon::now()->toDateString();

       // $peoples= People::whereBetween('joiningdate',array($diff,$current))->get();

//      return  CarbonInterval::week(2)->totalDays;
//        new DatePeriod(Carbon::parse("first monday of this month"), Carbon::parse("first monday of next month") );

        return view('attendance.daily',compact('att','att2','att3','att4'));
    }

    public function dailyAttendancePost(Request $request){
        $id=Auth::user()->local_id;
        $category=$request['category'];
        $day=Carbon::parse($request['date'])->day;
        $month=Carbon::parse($request['date'])->month;
        $year1=Carbon::parse($request['date'])->year;
        $post=Attendance::where('local_id',$id)->where('category',$category)
            ->whereDay('created_at',$day)
            ->whereMonth('created_at',$month)
            ->whereYear('created_at',$year1)
            ->get();
        $date=$day.'-'.$month.'-'.$year1;
        $year=Carbon::parse($request['date'])->format('jS F,Y');
        return view('attendance.daily',compact('post','date','category','year'));

    }

    public function dailyAttendanceExcel($id){

        return Excel::download(new DailyAttendanceExcel(request('id')),     'attendance.xlsx');
    }

    public function edit($id)
    {
        try {
            $local_id=Auth::user()->local_id;
            $attendance=Attendance::where('id',$id)->where('local_id',$local_id)->firstOrFail();
        }catch (ModelNotFoundException $exception){
            return back()->withError('Attendance not found by ID ' . $id)->withInput();
        }
        return  view('attendance.dailyEdit',compact('attendance','local_id'));
    }



    public function update(attendanceRequest $request, $id)
    {
        $local_id=Auth::user()->local_id;
        $id=$request['ids'];
        $attendance=Attendance::where('id',$id)->where('local_id',$local_id)->firstOrFail();
        $attendance->update($request->all());
        return redirect()->route('dailyAttendance')->with(['success'=>'Successfully Updated Attendance']);

    }

    public function destroy(Request $request)
    {
        try {
            $id=$request['ids'];
            $local_id=Auth::user()->local_id;
            Attendance::where('id',$id)->where('local_id',$local_id)->delete();
        }catch (ModelNotFoundException $exception){
            return back()->withError('Attendance not found by ID ' . $id)->withInput();
        }
        return  redirect()->route('dailyAttendance')->with(['success'=>'Successfully deleted']);
    }


}
