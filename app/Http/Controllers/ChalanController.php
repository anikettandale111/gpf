<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\taluka;
use App\year;
use Auth;
use App\Customer;
use App\master;
use App\department;
use App\designation;
use App\classification;
use App\month;
use App\deposit;
use App\Chalan;

class ChalanController extends Controller
{

    public function index()
    {
        $taluka=taluka::all();

        $Month=month::all();
        $classification=classification::all();
        $deposits=deposit::latest()->get();
        return view('Admin.monthly_chalan', compact("taluka",'Month','classification','deposits'));
    }

    public function Year_Edit($id)
    {
        $yedit=year::where('id','=',$id)->first();
        return view ('Admin.Year.year_edit', compact('yedit'));
    }
    public function Year_Update(Request $request)
    {
        $Newyear= year::find($request->id);
        $Newyear->year=$request->year;
        $Newyear->percent=$request->percent;
        $Newyear->from_month=$request->from_month;
        $Newyear->to_month=$request->to_month;
        $Newyear->save();
        return redirect('Year')->with('success',' Data  Udapte  Successfully ');
    }
    public function Year_Delete($id)
    {
        year::where('id',$id)->delete();
        return redirect("Year")->with('danger',' Data Deleted Successfully ');
    }

    public function Customer_Registration()
    {
        $customers=Customer::all();
        $taluka=taluka::all();
        $master=master::all();
        $classification=classification::all();
        $designation=designation::all();
        $department=department::all();

return view ('Admin.Customer.Customer_Registration', compact("customers","taluka","master","classification","designation","department"));
    }

    public function Custmoer_Insert_Data(Request $request )

    {
       $NewCustomer = new Customer();
        $NewCustomer->custmoer_no=$request->custmoer_no;
        $NewCustomer->taluka_code=$request->taluka_code;
        $NewCustomer->department_code=$request->department_code;
        $NewCustomer->name=$request->name;
        $NewCustomer->designation=$request->designation;
        $NewCustomer->classification=$request->classification;
        $NewCustomer->date_birth=$request->date_birth;
        $NewCustomer->date_dated=$request->date_dated;
        $NewCustomer->initial_balance=$request->initial_balance;
        $NewCustomer->retirement_date=$request->retirement_date;
        $NewCustomer->bank_name=$request->bank_name;
        $NewCustomer->branch=$request->branch;
        $NewCustomer->IFSC_code=$request->IFSC_code;
        $NewCustomer->account_order=$request->account_order;
        $NewCustomer->save();
       return redirect('Customer_Registration')->with('info',' Data  Successfully');
   }

   public function Customer_Edit($id)
   {
       $customer=Customer::where('id','=',$id)->first();
       return view ('Admin.Customer.Customer_edit', compact('customer'));
   }
   public function Customer_Delete($id)
   {
    Customer::where('id',$id)->delete();
       return redirect("Customer_Registration")->with('danger',' Data Deleted Successfully ');
   }
   public function Update_Customer(Request $request)
    {
        $NewCustomer= Customer::find($request->id);
        $NewCustomer->custmoer_no=$request->custmoer_no;
        $NewCustomer->taluka_code=$request->taluka_code;
        $NewCustomer->department_code=$request->department_code;
        $NewCustomer->name=$request->name;
        $NewCustomer->designation=$request->designation;
        $NewCustomer->classification=$request->classification;
        $NewCustomer->date_birth=$request->date_birth;
        $NewCustomer->date_dated=$request->date_dated;
        $NewCustomer->initial_balance=$request->initial_balance;
        $NewCustomer->retirement_date=$request->retirement_date;
        $NewCustomer->bank_name=$request->bank_name;
        $NewCustomer->branch=$request->branch;
        $NewCustomer->IFSC_code=$request->IFSC_code;
        $NewCustomer->account_order=$request->account_order;
        $NewCustomer->save();
        return redirect('Customer_Registration')->with('success',' Data  Udapte  Successfully ');
    }

    public function Master()
    {
        $masters=master::all();
        return view('Admin.Master.master', compact('masters'));
    }
     public function Master_Insert_Data(Request $request)
     {

        $Newmaster = new master();
        $Newmaster->department_code=$request->department_code;
        $Newmaster->designation=$request->designation;
        $Newmaster->classification=$request->classification;
        $Newmaster->bank_name=$request->bank_name;
        $Newmaster->save();
       return redirect('Master')->with('info',' Data  Successfully');
     }
     public function master_Edit($id)
     {
         $master=master::where('id','=',$id)->first();
         return view ('Admin.Master.master_edit', compact('master'));
     }
     public function Update_master(Request $request)
     {
         $Uptmaster= master::find($request->id);
         $Uptmaster->department_code=$request->department_code;
         $Uptmaster->designation=$request->designation;
         $Uptmaster->classification=$request->classification;
         $Uptmaster->bank_name=$request->bank_name;
         $Uptmaster->save();
         return redirect('Master')->with('success',' Data  Udapte  Successfully ');
     }
     public function master_Delete($id)
     {
        master::where('id',$id)->delete();
         return redirect("Master")->with('danger',' Data Deleted Successfully ');
     }

     public function Nomination_record()
     {
        echo"hii";
        die();
         return view ("Admin.Customer.nomination_record");
     }

     public function department()
     {
         $department=department::all();
         return view ("Admin.Master.department",compact("department"));
     }
     public function department_Insert_Data(Request $request)
     {
        $Newmaster = new department();
        $Newmaster->department_code=$request->department_code;
        $Newmaster->save();
       return redirect('department')->with('info',' Data  Successfully');
     }

     public function department_Edit($id)
     {
         $department=department::where('id','=',$id)->first();
         return view ('Admin.Master.edit_department', compact('department'));
     }
     public function Update_department(Request $request)
     {
         $Uptmaster= department::find($request->id);
         $Uptmaster->department_code=$request->department_code;
         $Uptmaster->save();
         return redirect('department')->with('success',' Data  Udapte  Successfully ');
     }
     public function department_Delete($id)
     {
        department::where('id',$id)->delete();
         return redirect("department")->with('danger',' Data Deleted Successfully ');
     }



     public function designation()
     {
        $designation=designation::all();
         return view ("Admin.Master.designation",compact("designation"));
     }
     public function designation_Insert_Data(Request $request)
     {
        $Newmaster = new designation();
        $Newmaster->designation=$request->designation;
        $Newmaster->save();
       return redirect('designation')->with('info',' Data  Successfully');
     }
     public function designation_Edit($id)
     {
         $designation=designation::where('id','=',$id)->first();
         return view ('Admin.Master.edit_designation', compact('designation'));
     }
     public function Update_designation(Request $request)
     {
         $Uptmaster= designation::find($request->id);
         $Uptmaster->designation=$request->designation;
         $Uptmaster->save();
         return redirect('designation')->with('success',' Data  Udapte  Successfully ');
     }
     public function designation_Delete($id)
     {
        designation::where('id',$id)->delete();
         return redirect("designation")->with('danger',' Data Deleted Successfully ');
     }

     public function classification()
     {
        $classification=classification::all();
         return view ("Admin.Master.classification",compact("classification"));
     }
     public function classification_Insert_Data(Request $request)
     {

        $Newmaster = new classification();
        $Newmaster->classification=$request->classification;
        $Newmaster->save();
       return redirect('classification')->with('info',' Data  Successfully');
     }
     public function classification_Edit($id)
     {
         $classification=classification::where('id','=',$id)->first();
         return view ('Admin.Master.edit_classification', compact('classification'));
     }
     public function Update_classification(Request $request)
     {
         $Uptmaster= classification::find($request->id);
         $Uptmaster->classification=$request->classification;
         $Uptmaster->save();
         return redirect('classification')->with('success',' Data  Udapte  Successfully ');
     }
     public function classification_Delete($id)
     {
        classification::where('id',$id)->delete();
         return redirect("classification")->with('danger',' Data Deleted Successfully ');
     }




}
