<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;

class BankMasterController extends Controller
{

    public function index()
    {
        $bank = Bank::all();
        return view('Admin.Master.bank', compact('bank'));
    }
    public function store(Request $request)
    {
        if ($request->bank_id == 0) {
            $bank = $request->bank_name_en;
            $bank = $request->bank_name_mar;
            Bank::create($request->all());
            $msg = "Recored Insert Successfully";
        } else {
            $bank = Bank::find($request->bank_id);
            $bank = $request->bank_name_en;
            $bank = $request->bank_name_mar;
            Bank::where('id', $request->bank_id)->update([
                'bank_name_en' => $request->bank_name_en,
                'bank_name_mar' => $request->bank_name_mar,

            ]);
            $msg = " Recored Update Successfully";
        }
        session()->flash('msg', $msg);
        return redirect()->back();
    }
    public function destroy($id)
    {
        Bank::find($id)->delete();
        return ['status' => 'success'];
    }
}
