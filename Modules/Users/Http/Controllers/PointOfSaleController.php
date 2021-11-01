<?php

namespace Modules\Users\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Users\Entities\Items;
use Modules\Users\Entities\PointOfSale;
use Modules\Users\Entities\Inventory;
use RealRashid\SweetAlert\Facades\Alert;

class PointOfSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $pointOfSale=Items::where('wareh_id',auth()->user()->ware_id)->get();
        $item=$pointOfSale->pluck('name','id');
        $data= pointOfSale::all();
        return view('users::pointOfSale.index',compact('pointOfSale','item','data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('users::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
         try {
            $item=Inventory::where('item_id',$request->item_id)->firstOrFail();
            $post=new pointOfSale();
            $post['item_id']= $request->item_id;
            $post['qty']= $request->qty;
            $post['unit_price']= $item->item_unit_price;
            $post['charges']= $request->charges;
            $post['user_id']= auth()->user()->id;
            $post['ware_id']= auth()->user()->ware_id;
            $post['point_category']= 1;
            $post['date']= date('Y-m-d');
            $post['sub_total']=($request->qty * $item->item_unit_price - $request->discount);
            if($post->save()){
                $item['qty']= $item->qty-$request->qty;
                $item->update();
            }

            $pos=PointOfSale::where('ware_id',auth()->user()->ware_id)->get();
            
            return redirect()->back()->with(['success'=>'Payment Successfully Made','data'=>$pos]);
          } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'Payment Not Successfully Made'.$th->getMessage()]);
          }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('users::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('users::edit');
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
