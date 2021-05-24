<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Taluka;
use App\Year;
use App\Account;
use App\Bank;
use App\Department;
use App\Designation;
use App\Classification;
use App\Month;
use App\GenerateApplication;
use App\AccountNaamNirdeshan;
use Session;
use Illuminate\Support\Facades\DB;

class TransferController extends Controller
{
  public function index(){
    $classification=Classification::all();
    $taluka=Taluka::all();
    $department = Department::all();
    $designation = Designation::all();
    $bank = Bank::all();
    $ganrate = GenerateApplication::select("gpf_number_application.*","departments.department_name_mar",
    "taluka.taluka_name_mar","classifications.classification_name_mar","classifications.inital_letter",
    "designations.designation_name_mar","bank.bank_name_mar")
    ->leftJoin("departments", "departments.id", "=", "gpf_number_application.department_id")
    ->leftJoin("taluka", "taluka.id", "=", "gpf_number_application.taluka_id")
    ->leftJoin("classifications", "classifications.id", "=", "gpf_number_application.classification_id")
    ->leftJoin("designations", "designations.id", "=", "gpf_number_application.designation_id")
    ->leftJoin("bank", "bank.id", "=", "gpf_number_application.bank_id")
    ->latest()->get();
    return view('Admin.Transfer.create',compact('classification','taluka','department','designation','bank','ganrate'));
  }
}
