<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Designation;

class DesignationMasterController extends Controller
{
    public function index()
    {
        $designation = Designation::all();
        return view("Admin.Master.designation", compact("designation"));
    }
    public function store(Request $request)
    {
        if ($request->designation_id == 0) {
            $designation = $request->designation_name_en;
            $designation = $request->designation_name_mar;
            Designation::create($request->all());
            $msg = "Recored Insert Successfully";
        } else {
            $designation = Designation::find($request->designation_id);
            $designation = $request->designation_name_en;
            $designation = $request->designation_name_mar;
            Designation::where('id', $request->designation_id)->update([
                'designation_name_en' => $request->designation_name_en,
                'designation_name_mar' => $request->designation_name_mar,

            ]);
            $msg = " Recored Update Successfully";
        }
        session()->flash('msg', $msg);
        return redirect()->back();
    }
    public function destroy($id)
    {
        Designation::find($id)->delete();
        return ['status' => 'success'];
    }
}
