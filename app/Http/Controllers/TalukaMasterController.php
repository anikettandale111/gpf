<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\District;
use App\Taluka;

class TalukaMasterController extends Controller
{
    public function index()
    {
         $district=District::all();
         $taluka = Taluka::select(
             "districts.dsitrict_id AS did",
             "districts.district_name_mar as district_name",
             "taluka.id AS tid",
             "taluka.taluka_name_en",
             "taluka.taluka_name_mar",
             "taluka.district_id")

         ->leftJoin("districts", "districts.dsitrict_id", "=", "taluka.district_id")
         ->get();
        return view('Admin.Taluka.taluka', compact("taluka","district"));
    }
    public function store(Request $request)
    {

        $collapse_div = 'taluka';
        $active_menu = 'taluka_master';
        $page_name = trans('language.h_taluka');

        if ($request->taluka_id == 0) {
            $taluka = $request->taluka_name_en;
            $taluka = $request->taluka_name_mar;
            $taluka = $request->district_id;
            taluka::create($request->all());
            $msg = " Taluka Insert Successfully";
        } else {
            $taluka =Taluka::find($request->taluka_id);
            $taluka = $request->taluka_name_en;
            $taluka = $request->taluka_name_mar;
            $taluka = $request->district_id;

            Taluka::where('id', $request->taluka_id)->update([
                'taluka_name_en' => $request->taluka_name_en,
                'taluka_name_mar' => $request->taluka_name_mar,
                'district_id' => $request->district_id,
            ]);
            $msg = " Taluka Update Successfully";
        }
        // session()->flash('msg', $msg);
        // return redirect()->back();
        return back()->with('info',$msg);
    }
    public function destroy($id)
    {

        Taluka::find($id)->delete();
        return ['status' => 'success'];
    }

}
