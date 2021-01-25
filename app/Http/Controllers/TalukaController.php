<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\taluka;
use App\Year;
use Auth;
use App\Customer;
use App\master;
use App\department;
use App\designation;
use App\classification;
use App\month;
use DB;
use App\District;

class TalukaController extends Controller
{

    public function index()
    {
         $taluka=taluka::all();
         $district = District::select("districts.dsitrict_id", "districts.district_name_mar as district_name")
         ->leftJoin("taluka", "taluka.district_id", "=", "districts.dsitrict_id")
         ->get();
        return view('Admin.Taluka.taluka', compact("taluka","district"));
    }
    public function taluka_insert_data(Request $request)
    {

        $Newtaluka = new taluka();

        $Newtaluka->taluka_name_en=$request->taluka_name_en;
        $Newtaluka->taluka_name_mar=$request->taluka_name_mar;
        $Newtaluka->district_id=$request->district_id;
        $Newtaluka->save();
       return redirect('Taluka')->with('info',' Data  Successfully ');
    }
    public function Taluka_Edit($id)
    {
        $tedit=taluka::where('id', $id)->first();
        return view ('Admin.Taluka.taluka_edit', compact('tedit'));
    }
    public function Taluka_Update(Request $request)
    {
        $Newtaluka= taluka::find($request->id);
        $Newtaluka->name= $request->name ;
        $Newtaluka->save();
        return redirect('Taluka')->with('success',' Data  Successfully ');
    }
    public function Talukat_Delete($id)
    {
        taluka::where('id',$id)->delete();
        return redirect("Taluka")->with('danger',' Data Deleted Successfully ');
    }
    public function year()
    {
        $Year=year::all();
        $Month=month::all();
        return view('Admin.Year.year', compact('Year','Month'));
    }
    public function Year_Insert_Data(Request $request)
    {
        $Newyear= new year();
        $Newyear->year=$request->year;
        $Newyear->percent=$request->percent;
        $Newyear->from_month=$request->from_month;
        $Newyear->to_month=$request->to_month;
        $Newyear->save();
       return redirect('Year')->with('info',' Data  Successfully ');
    }
    public function Year_Edit($id)
    {
        $yedit=year::where('id','=',$id)->first();
        $Month=month::all();
        return view ('Admin.Year.year_edit', compact('yedit','Month'));
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
        $NewCustomer->gpf_no=$request->gpf_no;
        $NewCustomer->taluka=$request->taluka;
        $NewCustomer->department=$request->department;
        $NewCustomer->name=$request->name;
        $NewCustomer->designation=$request->designation;
        $NewCustomer->classification=$request->classification;
        $NewCustomer->date_birth=$request->date_birth;
        $NewCustomer->date_dated=$request->date_dated;
        $NewCustomer->retirement_date=$request->retirement_date;
        $NewCustomer->bank_name=$request->bank_name;
        $NewCustomer->branch=$request->branch;
        $NewCustomer->IFSC_code=$request->IFSC_code;
        $NewCustomer->account_no=$request->account_no;
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
    // Customer::where('id',$id)->delete();
    //    return redirect("Customer_Registration")->with('danger',' Data Deleted Successfully ');
       Customer::where('id',$id)->delete();
        return ['id'=>$id];
   }
   public function Update_Customer(Request $request)
    {
        $NewCustomer= Customer::find($request->id);
        $NewCustomer->gpf_no=$request->gpf_no;
        $NewCustomer->taluka=$request->taluka;
        $NewCustomer->department=$request->department;
        $NewCustomer->name=$request->name;
        $NewCustomer->designation=$request->designation;
        $NewCustomer->classification=$request->classification;
        $NewCustomer->date_birth=$request->date_birth;
        $NewCustomer->date_dated=$request->date_dated;
        $NewCustomer->retirement_date=$request->retirement_date;
        $NewCustomer->bank_name=$request->bank_name;
        $NewCustomer->branch=$request->branch;
        $NewCustomer->IFSC_code=$request->IFSC_code;
        $NewCustomer->account_no=$request->account_no;
        $NewCustomer->save();
        return redirect('Customer_Registration')->with('success',' Data  Udapte  Successfully ');
    }
     public function Customer_new(Request $request)
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


    public function Master()
    {
        $masters=master::all();
        return view('Admin.Master.master', compact('masters'));
    }
     public function Master_Insert_Data(Request $request)
     {

        $Newmaster = new master();
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
         $Uptmaster->bank_name=$request->bank_name;
         $Uptmaster->save();
         return redirect('Master')->with('success',' Data  Udapte  Successfully ');
     }
     public function master_Delete($id)
     {
        master::where('id',$id)->delete();
         return redirect("Master")->with('danger',' Data Deleted Successfully ');
     }

    public function department()
     {
         $department=department::all();
         return view ("Admin.Master.department",compact("department"));
     }
     public function department_Insert_Data(Request $request)
     {
        $Newmaster = new department();
        $Newmaster->department=$request->department;
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
         $Uptmaster->department=$request->department;
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
