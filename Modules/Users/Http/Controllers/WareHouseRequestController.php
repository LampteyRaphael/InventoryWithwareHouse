<?php

namespace Modules\Users\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Users\Entities\Category;
use Modules\Users\Entities\Items;
use Modules\Users\Entities\Brands;
use Modules\Users\Entities\StatusCategory;
use Modules\Users\Entities\WareHouse;
use Modules\Users\Entities\WareHouseRequest;

class WareHouseRequestController extends Controller
{
    public function userID(){
          if($uerID =auth()->user()->id !==null){
          return $uerID;
        }
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
         $wareHouseRequest=WareHouseRequest::where('ware_id','=',auth()->user()->ware_id)->where('remark',2)->get();
        return view('users::wareHouseRequest.approved',compact('wareHouseRequest'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $wareHouseRequest=WareHouseRequest::where('ware_id','=',auth()->user()->ware_id)->where('remark',1)->get();

        return view('users::wareHouseRequest.pending',compact('wareHouseRequest'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        try{
            $wareHouseRequest=WareHouseRequest::where('id',$id)->where('user_id',$this->userID())->firstOrFail();
            $items=Items::where('user_id',auth()->user()->id)->pluck('name','id')->all();
            $warehouses=WareHouse::pluck('ware_house_name','warehouse_id')->all();
            return view('users::wareHouseRequest.form',compact('wareHouseRequest','items','warehouses'));
        }catch (ModelNotFoundException $exception){
            return back()->withError('Ware House Request not found by ID ' . $id)->withInput();
        }

    }

    public function reject()
    {
        $wareHouseRequest=WareHouseRequest::where('remark',3)->where('user_id',$this->userID())->get();
        return view('users::wareHouseRequest.rejected',compact('wareHouseRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('users::wareHouseRequest.rejected');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        try{
            $ware=WareHouseRequest::where('id',$id)->where('user_id',$this->userID())->firstOrFail();
            $ware->user_id=auth()->user()->id;
            $ware->item_id=$request->item_id;
            $ware->ware_id= auth()->user()->ware_id;
            $ware->quantity=$request->quantity;
            $ware->remark=1;
            $ware->save();
            return redirect()->back()->with('success','Success Updated');
        }catch (ModelNotFoundException $exception){
            return back()->withError('Ware House Request not found by ID ' . $id)->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try{
            $ware=WareHouseRequest::where('id',$id)->where('user_id',$this->userID())->firstOrFail();
            $ware->delete();
            return redirect()->back()->with('success','Success Deleted');
        }catch (ModelNotFoundException $exception){
            return back()->withError('Ware House Request not found by ID ' . $id)->withInput();
        }
    }
}
