<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Taluka;
use App\Department;
use App\User;
use App\Role;
use App\Designation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        if(session('year') !== null){

        } else {
          session()->put('year', date("Y",strtotime("-1 year")).'-'.date("Y"));
        }

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Admin.dashboard');
    }

    public function change_pwd()
    {
        return view('Admin.change_pwd');
    }

    public function submit_change_pwd(Request $request)
    {
        $user = User::where('id', Auth::id())->update(['password' => Hash::make($request->new_password)]);
        return redirect()->back()->with('success', 'Password  Udapte  Successfully ');
    }

    public function user_registration()
    {


        $data['users'] = User::select('users.*', 'taluka.taluka_name_mar as taluka_name', 'departments.department_name_mar as dept_name', 'u2.name as created')
            ->leftJoin('taluka', 'taluka.id', '=', 'users.taluka_id')
            ->leftJoin('departments', 'departments.id', '=', 'users.department_id')
            ->leftJoin('users as u2', 'u2.id', '=', 'users.created_by')
            ->latest()->get();
        $data['taluka'] = Taluka::all();
        $data['department'] = Department::all();
        $data['role'] = Role::where("role_status",1)->pluck("role_name","id");
        $data['designation'] = Designation::pluck("designation_name_en","id");


        return view('Admin.user_registration', $data);
    }
    public function user_registration_Edit($id)
    {
        $users = User::where('id', '=', $id)->first();
        $taluka = DB::Select(DB::raw('select * from taluka'));
        $department = DB::Select(DB::raw('select * from departments'));
        $role = Role::where("role_status",1)->pluck("role_name","id");
        $designation = Designation::pluck("designation_name_en","id");
        return view('Admin.user_registration_edit', compact("users", "taluka", "department","role",'designation'));
    }
    public function Registration_Delete($id, $para)
    {
        if ($para == 'Active') {
            $val = 0;
            $msg = 'User Inactive Successfully';
            $sym = 'danger';
        } elseif ($para == 'inactive') {
            $val = 1;
            $msg = 'User Active Successfully';
            $sym = 'success';
        }

        $users = User::where('id', $id)->update(['isactive' => $val]);
        return redirect()->back()->with($sym, $msg);
    }

    public function update_req(Request $request)
    {
        $NewUser = User::find($request->id);
        $NewUser->name = $request->name;
        $NewUser->phone = $request->phone;
        $NewUser->email = $request->email;
        $NewUser->taluka_id = $request->taluka_id;
        $NewUser->department_id = $request->department_id;
        $NewUser->save();
        return redirect('user_registration')->with('success', ' Data  Udapte  Successfully ');
    }

    protected function create_register(Request $request)
    {
        $user = User::where('email', $request['email'])->get();

        if (count($user) == 0) {
            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'taluka_id' => $request['taluka'],
                'phone' => $request['phone'],
                'department_id' => $request['department'],
                'created_by' => Auth::id(),
                'modified_by' => Auth::id(),
            ]);

            return redirect()->back()->with('success', 'Password  Udapte  Successfully ');
        }

        return redirect()->back()->with('false', 'Email-Id Already Exist');
    }
    public function languagechange($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return true;
    }
    public function yearchange($year)
    {
        session()->put('year', $year);
        return true;
    }
}
