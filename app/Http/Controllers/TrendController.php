<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\deposit;
use App\taluka;
use App\month;
use App\classification;
use App\department;
use App\designation;
use App\ganrate;
use Illuminate\Support\Facades\DB;
use App\vetan;

class TrendController extends Controller
{


  public function ganrate_new(Request $request)
   {


    $query = DB::raw('SELECT * FROM ganrate_new_number WHERE gpf_no='.$request->id);
    $result = DB::Select($query);
    if(isset($result[0])){
      return json_encode(['stuas'=>'success','msg' =>'Data Found' ,'userdata' =>$result]);
    }else{
      return json_encode(['stuas'=>'failed','msg' =>'Data Not Found' ]);
    }

   }





}

