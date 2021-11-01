<?php

namespace Modules\Locals\Http\Controllers;

use App\AttendanceCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttendanceCategoryController extends Controller
{
    public function store(Request $request){
        AttendanceCategory::create($request->all());
        return redirect()->back()->with(['success'=>'Category Created Successfully']);
    }
}
