<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Year;
use App\Month;

class YearController extends Controller
{
    public function index()
    {
        $data['Year']=Year::select(
        'master_rate_interest.*',
        'master_month.month_name_mar as from_month_text',
        'mm.month_name_mar as to_month_text',
        )
        ->leftJoin("master_month", "master_month.id", "=", "master_rate_interest.from_month")
        ->leftJoin("master_month as mm", "mm.id", "=", "master_rate_interest.to_month")
        ->latest()->get();
        $data['Month']=Month::all();
        return view('Admin.Year.year', $data);
    }
    public function store(Request $request)
    {
        if ($request->year_id == 0) {
            $Year = $request->year;
            $Year = $request->year_to;
            $Year = $request->percent;
            $Year = $request->from_month;
            $Year = $request->to_month;
            Year::create($request->all());
            $msg = " Recored Insert Successfully";
        } else {
            $Year = Year::find($request->year_id);
            $Year = $request->year;
            $Year = $request->year_to;
            $Year = $request->percent;
            $Year = $request->from_month;
            $Year = $request->to_month;
            Year::where('id', $request->year_id)->update([
                'year' => $request->year,
                'year_to' => $request->year_to,
                'percent' => $request->percent,
                'from_month' => $request->from_month,
                'to_month' => $request->to_month,

            ]);
            $msg = " Recored Update Successfully";
        }
        session()->flash('msg', $msg);
        return redirect()->back();
    }
    public function destroy($id)
    {
        Year::find($id)->delete();
        return ['status' => 'success'];
    }
}
