<?php

namespace Modules\Locals\Http\Controllers;

use App\AuditTrail;
use App\ErrorLog;
use App\ExpenditureCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepositeRequest;
use App\income;
use App\incomeCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $id=Auth::user()->local_id;
        $category=ExpenditureCategory::where('local_id',$id)->orwhere('local_id',0)->pluck('name','id')->all();

        return view('members.category.expenditurepost',compact('category','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $id=Auth::user()->local_id;
//        if ($id==13) {
            $category = incomeCategory::where('local_id', $id)->orwhere('local_id', 0)->pluck('name', 'id')->all();
            return view('members.category.create', compact('category', 'id'));
//        }else{
//            return  redirect(419);
//        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepositeRequest $request)
    {
        //
        $amount=$request->all();

        $c=incomeCategory::findOrFail($request['category_id']);

         income::create($amount);

        $audit=new AuditTrail();
        $audit->local_id=Auth::user()->local_id;
        $audit->category=' Deposited / ' . ' ' . ' GHS '.$request['amount'] .' '. $c->name.' / Income Category ';
        $audit->user_id=Auth::user()->id;
        $audit->save();

        return redirect()->route('income.show',Session::get('amountId'))->with(['success'=>'Income successfully Posted']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $ids=  Auth::user()->local_id;
//        if ($ids==13) {
        $category=incomeCategory::findOrFail($id);

        $year=Carbon::now()->year;

        Session(['amountId'=>$id]);

        $categoryAll=income::Latest()->where('category_id','=',$category->id)->where('local_id','=',$ids)
            ->whereYear('created_at',$year)->get();

        $categoryAllTotal=income::where('category_id','=',$category->id)->where('local_id','=',$ids)
            ->whereYear('created_at',$year)->pluck('amount')->sum();

        return view('members.income.show',compact('category','categoryAll','categoryAllTotal','ids'));

//        }else{
//            return  redirect(419);
//        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        //
        $income=income::findOrFail($id);

        $categoryName=incomeCategory::findorFail($income->category_id);

        return view('members.category.show',compact('income','categoryName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //
        $post=income::findOrFail($id);

        if (empty($request['reason'])){

            return redirect()->back()->with(['success'=>'Sorry Administrator, there must be a tangible reason for changing this figures']);
        }else

            $post->amount=$request['amount'];


        $log=new ErrorLog();
        $authName=Auth::user()->name;

        $local_id=Auth::user()->local_id;

        $log->local_id=$local_id;

        $log->name=$authName;

        $log->details='income Category'.'/'.$request['reason'].'/'.$request['amount'];

        $log->save();
        $post->update();
        return redirect()->route('income.show',session::get('amountId'))->with(['success'=>'Successfully Updated']);
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
