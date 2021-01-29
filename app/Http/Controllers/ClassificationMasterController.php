<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classification;

class ClassificationMasterController extends Controller
{
    public function index()
    {
        $classification=Classification::all();
        return view ("Admin.Master.classification",compact("classification"));
    }
    public function store(Request $request)
    {
        if ($request->classification_id == 0) {
            $classification = $request->classification_name_en;
            $classification = $request->classification_name_mar;
            Classification::create($request->all());
            $msg = "Recored Insert Successfully";
        } else {
            $classification = Classification::find($request->classification_id);
            $classification = $request->classification_name_en;
            $classification = $request->classification_name_mar;
            Classification::where('id', $request->classification_id)->update([
                'classification_name_en' => $request->classification_name_en,
                'classification_name_mar' => $request->classification_name_mar,

            ]);
            $msg = " Recored Update Successfully";
        }
        session()->flash('msg', $msg);
        return redirect()->back();
    }
    public function destroy($id)
    {
        Classification::find($id)->delete();
        return ['status' => 'success'];
    }
}
