<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Year;
use App\Month;
use DB;

class YearController extends Controller
{
    public function index()
    {
        $query=DB::raw('SELECT `master_rate_interest`.*, `mmo`.`month_name_mar` as `from_month_text`, `mmt`.`month_name_mar` as `to_month_text` FROM `master_rate_interest` left join `master_month` AS `mmo` ON `mmo`.`id` = `master_rate_interest`.`from_month` left join `master_month` AS `mmt` ON `mmt`.`id` = `master_rate_interest`.`to_month` order by `created_at` desc');
        $data['Year'] = DB::select($query);
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
