<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\DB;

class EmployeeReportsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('Reports/index');
    }
    public function store(Request $request){
      $lang = app()->getLocale();
      if($request->view_report_type == 1){

        $query = DB::raw('SELECT CONCAT(clf.inital_letter,emc.gpf_number) AS inital_gpf_number,emc.emc_month,emc.emc_year,mm.month_name_'.$lang.' AS month_name,
                          dp.department_name_'.$lang.' AS department_name,dg.designation_name_'.$lang.' AS designation_name,tl.taluka_name_'.$lang.' AS taluka_name,emc.monthly_contrubition,
                          emc.monthly_received,emc.loan_amonut,emc.monthly_other
                          FROM master_emp_monthly_contribution emc
                          LEFT JOIN departments dp ON dp.id=emc.emc_dept_id
                          LEFT JOIN designations dg ON dg.id=emc.emc_desg_id
                          LEFT JOIN master_month mm ON mm.id=emc.emc_month
                          LEFT JOIN taluka tl ON tl.id=emc.taluka_id
                          LEFT JOIN classifications clf ON clf.id=emc.classification_id
                          WHERE emc.gpf_number='.$request->employee_gpf_num.'
                          AND emc.emc_year=2017
                          ORDER BY emc.emc_month');
        $result = DB::select($query);
        $employee_name = DB::raw('SELECT employee_name FROM master_employee WHERE gpf_no='.$request->employee_gpf_num);
        $result['employee_name'] = DB::select($employee_name);
        print_r($result);die();
        return view('Reports/report_88',compact('result'));
      } else if ($request->view_report_type == 2){

      } else if ($request->view_report_type == 3){

      }
    }
}
