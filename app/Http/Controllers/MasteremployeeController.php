<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masteremployee;

class MasteremployeeController extends Controller
{
 public function master_employee_view()
 {
    $data['master_employee_view'] = Masteremployee::select("master_employee.*","departments.department_name_mar",
                          "taluka.taluka_name_mar","classifications.classification_name_mar","classifications.inital_letter",
                          "designations.designation_name_mar","bank.bank_name_mar",)
        ->leftJoin("departments", "departments.id", "=", "master_employee.department_id")
        ->leftJoin("taluka", "taluka.id", "=", "master_employee.taluka_id")
        ->leftJoin("classifications", "classifications.id", "=", "master_employee.classification_id")
        ->leftJoin("designations", "designations.id", "=", "master_employee.designation_id")
        ->leftJoin("bank", "bank.id", "=", "master_employee.bank_id")
        ->latest()->get();
      return view('Admin.Ganrate.master_employee',$data);
 }
}
