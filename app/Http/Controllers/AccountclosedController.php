<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\taluka;
use App\year;
use App\Account;
use App\master;
use App\department;
use App\designation;
use App\classification;
use App\month;
use DB;

class AccountclosedController extends Controller
{
    public function closed_account()
    {
    	$Accounts=Account::latest()->get();
        $taluka=taluka::all();
        $master=master::all();
        $classification=classification::all();
        $designation=designation::all();
        $department=department::all(); 
        $Year=year::all();
        $Month=month::all();
    	return view ('Admin.Account.closed_account', compact("Accounts","taluka","master","classification","designation","department","Year","Month"));
    }

    public function account_Insert_Data(Request $request)
    {
    	$Accounts = new Account;
	 
	    $Accounts->gpf_no=$request->gpf_no;
	    $Accounts->taluka=$request->taluka;
	    $Accounts->department=$request->department;
	    $Accounts->name=$request->name;
	    $Accounts->designation=$request->designation;
	    $Accounts->month_interest_payable=$request->month_interest_payable;
	    $Accounts->last_due_year=$request->last_due_year;
	    $Accounts->feet_interest_payable_month=$request->feet_interest_payable_month;
	    $Accounts->feet_interest_payable_year=$request->feet_interest_payable_year;
	    $Accounts->last_subscription_month=$request->last_subscription_month;
	    $Accounts->last_subscription_year=$request->last_subscription_year;
	    $Accounts->save();
	    return redirect ('closed_account')->with('success',' Data  Successfully');
    }
    public function account_new(Request $request)
      {

          $query = DB::raw('SELECT * FROM ganrate_new_number WHERE b_no='.$request->id); 
          $result = DB::Select($query);
        
        if(isset($result[0])){
          return json_encode(['stuas'=>'success','msg' =>'data success ' ,'userdata' =>$result]);
        }else{
             
             $message = "data";
             if ($message) {
             $success = true;
              $message = "Record Not Found";
        }
        return json_encode(['stuas'=>'failed','msg' =>$message]);
        }
        
      }

    public function account_Delete($id)
	 {
	 	
	    Account::where('id',$id)->delete();
	    return ['id'=>$id];
	 }
}
