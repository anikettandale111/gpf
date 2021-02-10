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
use Illuminate\Support\Facades\DB;

class AccountclosedController extends Controller
{
    public function index()
    {
        $data['Accounts'] = Account::select(
            'closed_account.*',
            'taluka.taluka_name_mar',
            'designations.designation_name_mar',
            'departments.department_name_mar',
            'master_month.month_name_mar as month_interest_payable',
            'mm.month_name_mar as feet_interest_payable_month',
            'm_m.month_name_mar as last_subscription_month'
        )
            ->leftJoin("taluka", "taluka.id", "=", "closed_account.taluka")
            ->leftJoin("departments", "departments.id", "=", "closed_account.department")
            ->leftJoin("designations", "designations.id", "=", "closed_account.designation")
            ->leftJoin("master_month", "master_month.id", "=", "closed_account.month_interest_payable")
            ->leftJoin("master_month as mm", "mm.id", "=", "closed_account.feet_interest_payable_month")
            ->leftJoin("master_month as m_m", "m_m.id", "=", "closed_account.last_subscription_month")
            ->latest()->get();
        $data['taluka'] = Taluka::all();
        $data['designation'] = designation::all();
        $data['department'] = department::all();

        $data['month'] = month::all();
        return view('Admin.Account.closed_account', $data);
    }

    public function account_Insert_Data(Request $request)
    {
        $Accounts = new Account;

        $Accounts->gpf_no = $request->gpf_no;
        $Accounts->taluka = $request->taluka;
        $Accounts->department = $request->department;
        $Accounts->name = $request->name;
        $Accounts->designation = $request->designation;
        $Accounts->month_interest_payable = $request->month_interest_payable;

        $Accounts->last_due_year = $request->last_due_year;
        $Accounts->feet_interest_payable_month = $request->feet_interest_payable_month;

        $Accounts->feet_interest_payable_year = $request->feet_interest_payable_year;
        $Accounts->last_subscription_month = $request->last_subscription_month;
        $Accounts->last_subscription_year = $request->last_subscription_year;
        $Accounts->save();
        return redirect('closed_account')->with('success', ' Data  Successfully');
    }
    public function account_new(Request $request)
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

    public function account_Delete($id)
    {

        Account::where('id', $id)->delete();
        return ['id' => $id];
    }
}
