<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Bill;
use DataTables;


class BillController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Bill::latest()->get();
            return Datatable::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBill">Edit</a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBill">Delete</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('Admin.Bill.bill_infromation');
    }

    public function bill_insert( Request $request)
    {
        DB::table('bill_information')->insert([
            'bill_no' => $request->input('bill_no'), //$request->title
            'bill_date' => $request->input('bill_date'), //$request->details
            'amount' => $request->input('amount'), //$request->details
            'bill_check' => $request->input('bill_check'), //$request->details
            'check_date' => $request->input('check_date'), //$request->details
            'check_no' => $request->input('check_no'), //$request->details
       ]);
        return response()->json( ['success' => true,'message' => 'Data inserted successfully']);
    }
  public function getlast_billnumber(){
      return Bill::max("bill_no");
  }
}
