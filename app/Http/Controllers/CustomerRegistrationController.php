<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Classification;
use App\Taluka;
use App\Bank;
use App\Customer;
use App\Designation;



class CustomerRegistrationController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        $taluka = Taluka::all();
        $bank = Bank::all();
        $classification = Classification::all();
        $designation = Designation::all();
        $department = Department::all();
        return view('Admin.Customer.Customer_Registration', compact("customers", "taluka", "bank", "classification", "designation", "department"));
    }
    public function custmoer_insert_data(Request $request)

    {
        dd($request->all());
        exit;
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
        $NewCustomer->bank_name = $request->bank_name;
        $NewCustomer->branch = $request->branch;
        $NewCustomer->IFSC_code = $request->IFSC_code;
        $NewCustomer->account_no = $request->account_no;
        $NewCustomer->save();
        return redirect('Customer_Registration')->with('info', ' Data  Successfully');
    }
    public function customer_edit($id)
    {
        $customer = Customer::where('id', '=', $id)->first();
        return view('Admin.Customer.Customer_edit', compact('customer'));
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
        $NewCustomer->bank_name = $request->bank_name;
        $NewCustomer->branch = $request->branch;
        $NewCustomer->IFSC_code = $request->IFSC_code;
        $NewCustomer->account_no = $request->account_no;
        $NewCustomer->save();
        return redirect('Customer_Registration')->with('success', ' Data  Udapte  Successfully ');
    }

    public function customer_new(Request $request)
    {

        $query = DB::raw('SELECT * FROM ganrate_new_number WHERE b_no=' . $request->id);
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
}
