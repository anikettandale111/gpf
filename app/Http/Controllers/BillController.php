<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Bill;
use DataTables;


class BillController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Bill::latest()->get();
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id ="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editBill">Edit</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteBill">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('Admin.Bill.bill_infromation');
    }

    public function bill_insert(Request $request)
    {

        if ($request->bill_row_id == 0) {
            $newBill = $request->bill_no;
            $newBill = $request->bill_date;
            $newBill = $request->amount;
            $newBill = $request->bill_check;
            $newBill = $request->check_date;
            $newBill = $request->check_no;
            Bill::create($request->all());
            $msg=" Recored Insert Successfully";

            } else {
            $newBill = Bill::find($request->bill_row_id);
            $newBill = $request->bill_no;
            $newBill = $request->bill_date;
            $newBill = $request->amount;
            $newBill = $request->bill_check;
            $newBill = $request->check_date;
            $newBill = $request->check_no;
            Bill::where('id',$request->bill_row_id)->update([
                'bill_no'=>$request->bill_no,
                'bill_date'=>$request->bill_date,
                'amount'=>$request->amount,
                'bill_check'=>$request->bill_check,
                'check_date'=>$request->check_date,
                'check_no'=>$request->check_no,
                ]);
            $msg=" Recored Update Successfully";
        }

        session()->flash('msg', $msg);
        return redirect()->back();
    }
    public function getlast_billnumber()
    {
        return Bill::max("bill_no");
    }
    public function edit_bill(Request $req)
    {
        return Bill::where('id',$req->id)->first();

    }

    public function delete_bill(Request $req)
    {
        return Bill::where('id',$req->id)->delete();

    }
}
