<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentMasterController extends Controller
{
    public function index()
    {
        $department = Department::all();
        return view("Admin.Master.department", compact("department"));
    }
    public function store(Request $request)
    {
        if ($request->department_id == 0) {
            $department = $request->department_name_en;
            $department = $request->department_name_mar;
            Department::create($request->all());
            $msg = " Recored Insert Successfully";
        } else {
            $department = Department::find($request->department_id);
            $department = $request->department_name_en;
            $department = $request->department_name_mar;
            Department::where('id', $request->department_id)->update([
                'department_name_en' => $request->department_name_en,
                'department_name_mar' => $request->department_name_mar,

            ]);
            $msg = " Recored Update Successfully";
        }
        session()->flash('msg', $msg);
        return redirect()->back();
    }
    public function destroy($id)
    {
        Department::find($id)->delete();
        return ['status' => 'success'];
    }
}
