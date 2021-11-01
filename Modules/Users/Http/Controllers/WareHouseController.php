<?php

namespace Modules\Users\Http\Controllers;

use App\Models\WareHouse;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Users\Entities\Items;
use Modules\Users\Entities\WareHouseRequest;

class WareHouseController extends Controller
{

/*
WareHouse Account Crated By the User
*/
    public function index()
    {
        $wareHouse = WareHouse::all();
        $items=Items::pluck('name','id')->all();
        $warehouses=WareHouse::pluck('ware_house_name','warehouse_id')->all();
        return view('users::warehouse.index',compact('wareHouse','items','warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('users::warehouse.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
       $ware=new WareHouseRequest();
        $ware->user_id=auth()->user()->id;
        $ware->item_id=$request->item_id;
        $ware->ware_id= auth()->user()->ware_id;
        $ware->quantity=$request->quantity;
        $ware->remark=1;
        $ware->save();
       return redirect()->back()->with('success','Successfully Saved');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('users::warehouse.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('users::warehouse.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
