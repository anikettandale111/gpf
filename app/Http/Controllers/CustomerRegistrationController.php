<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Classification;
use App\Taluka;
use App\Bank;
use App\Customer;
use App\Designation;
use Illuminate\Support\Facades\DB;



class CustomerRegistrationController extends Controller
{
    public function index()
    {
        $data['customers'] = Customer::select(
            'customer_registrations.*',
            'taluka.taluka_name_mar',
            'classifications.classification_name_mar',
            'designations.designation_name_mar',
            'departments.department_name_mar',
            'bank.bank_name_mar'
          )
          ->leftJoin("taluka", "taluka.id", "=","customer_registrations.taluka")
          ->leftJoin("classifications", "classifications.id", "=", "customer_registrations.classification")
          ->leftJoin("departments", "departments.id", "=", "customer_registrations.department")
          ->leftJoin("bank", "bank.id", "=", "customer_registrations.bank")
          ->leftJoin("designations", "designations.id", "=", "customer_registrations.designation")
          ->latest()->get();
        $data['taluka'] = Taluka::all();
        $data['bank'] = Bank::all();
        $data['classification'] = Classification::all();
        $data['designation'] = Designation::all();
        $data['department'] = Department::all();
        return view('Admin.Customer.Customer_Registration', $data);
    }
    public function customer_new(Request $request)
    {

        $query = DB::raw('SELECT * FROM ganrate_new_number WHERE gpf_no=' . $request->id);
        $result = DB::Select($query);
        if (isset($result[0])) {
            return json_encode(['stuas' => 'success', 'msg' => 'data success ', 'userdata' => $result]);
        } else {

            $message = "data";
            if ($message) {
                $success = true;
                $message = "Record Not Found";
            }
            return json_encode(['stuas' => 'failed', 'msg' => $message]);
        }
    }
    public function store(Request $request)

    {

        $NewCustomer = new Customer();
        $NewCustomer->gpf_no = $request->gpf_no;
        $NewCustomer->taluka = $request->taluka;
        $NewCustomer->department = $request->department;
        $NewCustomer->name = $request->name;
        $NewCustomer->designation = $request->designation;
        $NewCustomer->classification = $request->classification;
        $NewCustomer->date_birth = $request->date_birth;
        $NewCustomer->date_dated = $request->date_dated;
        $NewCustomer->retirement_date = $request->retirement_date;
        $NewCustomer->bank = $request->bank;
        $NewCustomer->branch = $request->branch;
        $NewCustomer->IFSC_code = $request->IFSC_code;
        $NewCustomer->account_no = $request->account_no;
        $NewCustomer->save();
        return redirect('customer_registration')->with('info', ' Data  Successfully');
    }
    public function customer_edit($id)
    {

        $customer['customer'] = Customer::select(
            'customer_registrations.*',
            'taluka.taluka_name_mar',
            'classifications.classification_name_mar',
            'designations.designation_name_mar',
            'departments.department_name_mar',
            'bank.bank_name_mar'
          )
          ->where('customer_registrations.id' ,$id)
          ->leftJoin("taluka", "taluka.id", "=","customer_registrations.taluka")
          ->leftJoin("classifications", "classifications.id", "=", "customer_registrations.classification")
          ->leftJoin("departments", "departments.id", "=", "customer_registrations.department")
          ->leftJoin("bank", "bank.id", "=", "customer_registrations.bank")
          ->leftJoin("designations", "designations.id", "=", "customer_registrations.designation")
          ->first();
          $customer['taluka'] = Taluka::all();
          $customer['bank'] = Bank::all();
          $customer['classification'] = Classification::all();
          $customer['designation'] = Designation::all();
          $customer['department'] = Department::all();
        return view('Admin.Customer.Customer_edit', $customer);
    }
    public function Customer_Delete($id)
    {
        Customer::where('id', $id)->delete();
        return ['id' => $id];
    }
    public function customer_update(Request $request)
    {

        $NewCustomer = Customer::find($request->id);
        $NewCustomer->gpf_no = $request->gpf_no;
        $NewCustomer->taluka = $request->taluka;
        $NewCustomer->department = $request->department;
        $NewCustomer->name = $request->name;
        $NewCustomer->designation = $request->designation;
        $NewCustomer->classification = $request->classification;
        $NewCustomer->date_birth = $request->date_birth;
        $NewCustomer->date_dated = $request->date_dated;
        $NewCustomer->retirement_date = $request->retirement_date;
        $NewCustomer->bank = $request->bank;
        $NewCustomer->branch = $request->branch;
        $NewCustomer->IFSC_code = $request->IFSC_code;
        $NewCustomer->account_no = $request->account_no;
        $NewCustomer->save();
        return redirect('customer_registration')->with('success', ' Data  Udapte  Successfully ');
    }


}
