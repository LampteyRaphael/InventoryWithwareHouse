<?php

namespace Modules\Locals\Http\Controllers;

use App\Area;
use App\AuditTrail;
use App\District;
use App\Http\Controllers\Controller;
use App\Locals;
use App\Region;
use App\User;
use Carbon\Carbon;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardForLocalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $id=Auth::user()->local_id;
        $january=User::where('is_active',1)->where('local_id',$id)->whereMonth('created_at',1)->whereYear('created_at',Carbon::now()->year)->count();
        $febuary=User::where('is_active',1)->where('local_id',$id)->whereMonth('created_at',2)->whereYear('created_at',Carbon::now()->year)->count();
        $march=User::where('is_active',1)->where('local_id',$id)->whereMonth('created_at',3)->whereYear('created_at',Carbon::now()->year)->count();
        $april=User::where('is_active',1)->where('local_id',$id)->whereMonth('created_at',4)->whereYear('created_at',Carbon::now()->year)->count();
        $may=User::where('is_active',1)->where('local_id',$id)->whereMonth('created_at',5)->whereYear('created_at',Carbon::now()->year)->count();
        $june=User::where('is_active',1)->where('local_id',$id)->whereMonth('created_at',6)->whereYear('created_at',Carbon::now()->year)->count();
        $july=User::where('is_active',1)->where('local_id',$id)->whereMonth('created_at',7)->whereYear('created_at',Carbon::now()->year)->count();
        $august=User::where('is_active',1)->where('local_id',$id)->whereMonth('created_at',8)->whereYear('created_at',Carbon::now()->year)->count();
        $september=User::where('is_active',1)->where('local_id',$id)->whereMonth('created_at',9)->whereYear('created_at',Carbon::now()->year)->count();
        $october=User::where('is_active',1)->where('local_id',$id)->whereMonth('created_at',10)->whereYear('created_at',Carbon::now()->year)->count();
        $november=User::where('is_active',1)->where('local_id',$id)->whereMonth('created_at',11)->whereYear('created_at',Carbon::now()->year)->count();
        $december=User::where('is_active',1)->where('local_id',$id)->whereMonth('created_at',12)->whereYear('created_at',Carbon::now()->year)->count();

        $localsAdmins=User::where('role_id',4)->where('local_id',$id)
            ->where('is_active',1)->count();

        $admins=    Charts::create('donut', 'highcharts')
            ->title('Admin For Your Local')
            ->labels(['Local Admins'])
            ->values([$localsAdmins])
            ->dimensions(100,$localsAdmins)
            ->responsive(true);

        //summey of male,female,below 15 and above 15years of age
        $elders=User::where('is_active',1)->whereIn('role_id',[1,2,3,4,5])->where('officeHeld','elder')->where('local_id',$id)->count();
        $deacon=User::where('is_active',1)->whereIn('role_id',[1,2,3,4,5])->where('officeHeld','deacon')->where('local_id',$id)->count();
        $deaconess=User::where('is_active',1)->whereIn('role_id',[1,2,3,4,5])->where('officeHeld','deaconess')->where('local_id',$id)->count();
        $pastors=User::where('is_active',1)->whereIn('role_id',[1,2,3,4,5])->where('officeHeld','pastor')->where('local_id',$id)->count();
        $presiding=User::where('is_active',1)->whereIn('role_id',[1,2,3,4,5])->where('officeHeld','presiding elder')->where('local_id',$id)->count();
        $apostles=User::where('is_active',1)->whereIn('role_id',[1,2,3,4,5])->where('officeHeld','apostle')->where('local_id',$id)->count();
        $members=User::where('is_active',1)->whereIn('role_id',[1,2,3,4,5])->where('officeHeld','member')->where('local_id',$id)->count();

        $female=User::where('is_active',1)->where('gender','female')->whereIn('role_id',[1,2,3,4,5])->where('local_id',$id)->count();
        $male=User::where('is_active',1)->where('gender','male')->whereIn('role_id',[1,2,3,4,5])->where('local_id',$id)->count();
        $newConvertTotals=User::where('is_active',1)->where('officeHeld','new convert')->whereIn('role_id',[1,2,3,4,5])->where('local_id',$id)->count();

        $from = Carbon::today()->subYears(0); //from 0 to 60yrs of age male
        $to = Carbon::today()->subYears(61);
        $maleAboves= User::whereBetween('birthDate',[$to, $from])->where('gender','male')->where('is_active',1)->whereIn('role_id',[1,2,3,4,5])->where('local_id',$id)->count();

        $from = Carbon::today()->subYears(0); //from 0 to 60yrs of age male
        $to = Carbon::today()->subYears(61);
        $femaleAboves= User::whereBetween('birthDate',[$to, $from])->where('gender','female')->where('is_active',1)->whereIn('role_id',[1,2,3,4,5])->where('local_id',$id)->count();

        $from = Carbon::today()->subYears(14); //from 15 to 60yrs of age female
        $to = Carbon::today()->subYears(61);
        $femaleBetweenAgesof15to60= User::whereBetween('birthDate',[$to, $from])->where('gender',strtolower('female'))->whereIn('role_id',[1,2,3,4,5])->where('local_id',$id)->where('is_active',1)->count();

        $from = Carbon::today()->subYears(14); //from 15 to 60yrs of age female
        $to = Carbon::today()->subYears(61);
        $maleBetweenAgesof15to60= User::whereBetween('birthDate',[$to, $from])->where('gender',strtolower('male'))->whereIn('role_id',[1,2,3,4,5])->where('local_id',$id)->where('is_active',1)->count();

        $from = Carbon::today()->subYears(12); //from 13 to 25yrs of age
        $to = Carbon::today()->subYears(26);
        $youth= User::whereBetween('birthDate',[$to, $from])->where('is_active',1)->whereIn('role_id',[1,2,3,4,5])->where('local_id',$id)->count();

        $from = Carbon::today()->subYears(19); //from 20 to 25yrs of age
        $to = Carbon::today()->subYears(26);
        $youngAdult= User::whereBetween('birthDate',[$to, $from])->where('is_active',1)->whereIn('role_id',[1,2,3,4,5])->where('local_id',$id)->count();

        $from = Carbon::today()->subYears(15); //from 16 to 19yrs of age
        $to = Carbon::today()->subYears(20);
        $seniorYouth= User::whereBetween('birthDate',[$to, $from])->where('is_active',1)->whereIn('role_id',[1,2,3,4,5])->where('local_id',$id)->count();

        $from = Carbon::today()->subYears(12); //from 13 to 15yrs of age
        $to = Carbon::today()->subYears(16);
        $juniorYouth= User::whereBetween('birthDate',[$to, $from])->where('is_active',1)->whereIn('role_id',[1,2,3,4,5])->where('local_id',$id)->count();

        $from = Carbon::today()->subYears(0); //from 0 to 12yrs of age
        $to = Carbon::today()->subYears(13);
        $childrenMinistry= User::whereBetween('birthDate',[$to, $from])->where('is_active',1)->whereIn('role_id',[1,2,3,4,5])->where('local_id',$id)->count();


        $aposa=User::where('is_active',1)->whereIn('role_id',[1,2,3,4,5])->where('local_id',$id)->where('movementGroup','LIKE','%'.strtolower('aposa').'%')->count();
        $youngAdultCharts=   Charts::create('bar', 'highcharts')
            ->title('Youth Ministry Breakdown (13-25yrs)')
            ->elementLabel('Youth Ministry')
            ->labels(['Junior(13-15) Youth Ministry','Senior(16-19) Youth Ministry','Young Adults(20-25yrs)','APOSA'])
            ->values([$juniorYouth,$seniorYouth,$youngAdult,$aposa])
            ->dimensions(1000,500)
            ->responsive(true);


        $levelsBreakdown= Charts::create('bar', 'highcharts')
            ->title('Members')
            ->elementLabel('Members')
            ->labels(['Male Above 60', 'Female Above 60','Male Between 15-60','Female Between 15-60','Elders', 'Deacon', 'Deaconess', 'Pastors', 'Presiding Elders','Apostle','Church Members','New Convert'])
            ->values([$maleAboves,$femaleAboves,$maleBetweenAgesof15to60,
                $femaleBetweenAgesof15to60,$elders,$deacon,$deaconess,$pastors,
                $presiding,$apostles,$members,$newConvertTotals ])
            ->dimensions(1000,500)
            ->responsive(true);



        //monthly population registration
        $population=    Charts::multi('areaspline', 'highcharts')
            ->title('Monthly Registered Members')
            ->elementLabel('Members')
            ->colors(['#ff0000', '#ffffff'])
            ->labels(['January','February', 'March', 'April', 'May', 'June','July','August','September','October','November','December'])
            ->dataset('Monthly', [$january,$febuary,$march, $april, $may, $june, $july,$august,$september,$october,$november,$december]);



        $loginCount=AuditTrail::where('category','LIKE','%'.'Login'.'%')->whereYear('created_at',Carbon::now()->year)->where('local_id',$id)->count();

        $update=AuditTrail::where('category','LIKE','%'.'Updated'.'%')->whereYear('created_at',Carbon::now()->year)->where('local_id',$id)->count();

        $delete=AuditTrail::where('category','LIKE','%'.'Deleted'.'%')->whereYear('created_at',Carbon::now()->year)->where('local_id',$id)->count();

        $total=User::where('is_active',1)->where('local_id',$id)->whereIn('role_id',[1,2,3,4,5])->count();

        $nonactive=User::where('is_active',0)->whereIn('role_id',[1,2,3,4,5])->where('local_id',$id)->count();

        $deceased=User::where('is_active',3)->whereIn('role_id',[1,2,3,4,5])->where('local_id',$id)->count();

        //total Member in the system
        $totalMembers=    Charts::create('percentage', 'justgage')
            ->title('Membership')
            ->elementLabel('Total Number')
            ->values([$total,0,$total])
            ->responsive(true)
            ->height(300)
            ->width(0);

        //total Member in the system
        $maleTotal=    Charts::create('percentage', 'justgage')
            ->title('Male')
            ->elementLabel('Total Number')
            ->values([$male,0,($total)])
            ->responsive(true)
            ->height(300)
            ->width(0);


        $femaleTotal=    Charts::create('percentage', 'justgage')
            ->title('Female')
            ->elementLabel('Total Number')
            ->values([$female,0,$total])
            ->responsive(true)
            ->height(300)
            ->width(0);

        $totalYouth=    Charts::create('percentage', 'justgage')
            ->title('Youth Ministry(13-25yrs)')
            ->elementLabel('Youth')
            ->values([$youth,0,$total])
            ->responsive(true)
            ->height(300)
            ->width(0);



        $childrenTotal=    Charts::create('percentage', 'justgage')
            ->title('Children(13years and below)')
            ->elementLabel('Children')
            ->values([$childrenMinistry,0,$total])
            ->responsive(true)
            ->height(300)
            ->width(0);

        $newConvertTotal=    Charts::create('percentage', 'justgage')
            ->title('New Convert')
            ->elementLabel('New Convert')
            ->values([$newConvertTotals,0,$total])
            ->responsive(true)
            ->height(300)
            ->width(0);


        //creating login information
        $loginCounts=    Charts::create('percentage', 'justgage')
            ->title('Login')
            ->elementLabel('Login')
            ->values([$loginCount,0,$loginCount+$loginCount])
            ->responsive(true)
            ->height(400)
            ->width(0);

        //update
        $update=    Charts::create('percentage', 'justgage')
            ->title('Update')
            ->elementLabel('Update')
            ->values([$update,0,$loginCount+$loginCount])
            ->responsive(true)
            ->height(300)
            ->width(0);

        //delete
        $delete=    Charts::create('percentage', 'justgage')
            ->title('Delete')
            ->elementLabel('Delete')
            ->values([$delete,0,$delete+$delete])
            ->responsive(true)
            ->height(300)
            ->width(0);


        //creating none active  information
        $nonactive=    Charts::create('percentage', 'justgage')
            ->title('Non Active(Members Blocked)')
            ->elementLabel('Non Active')
            ->values([$nonactive,0,$total])
            ->responsive(true)
            ->height(400)
            ->width(0);

        //creating deceased information
        $deceased=    Charts::create('percentage', 'justgage')
            ->title('Deceased')
            ->elementLabel('Deceased')
            ->values([$deceased,0,$total])
            ->responsive(true)
            ->height(400)
            ->width(0);

        $localName=Auth::user()->local->name;
        return view('members.edit',compact('members',
            'female','loginCounts','update','delete','totalMembers','population','admins','levelsBreakdown',
            'male','nonactive','deceased','maleTotal','femaleTotal','childrenTotal','newConvertTotal',
            'localName','totalYouth', 'maleBetweenAgesof15to60', 'femaleBetweenAgesof15to60','youngAdultCharts'
        ));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
