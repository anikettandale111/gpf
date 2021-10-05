<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Config;
use App\Taluka;
use App\Department;
use App\User;
use App\Designation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;

use Session;

class UserRegistrationController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
      $this->middleware('permission:user-create', ['only' => ['index','store']]);
      $this->middleware('permission:user-edit', ['only' => ['index','store']]);
      $this->middleware('permission:user-delete', ['only' => ['destroy']]);

    if(session('from_year') !== null){

    } else {
      Session::put('from_year', date("Y"));
      Session::put('to_year', date("Y",strtotime("+1 year")));
      Session::put('financial_year', date("Y").'-'.date("Y",strtotime("+1 year")));
    }
    $this->middleware(function ($request, $next) {
      // fetch session and use it in entire class with constructor
      $current_db = session('selected_database');
      if(session('selected_database') == null){
        $current_db = 'mysql';
        Session::put('selected_database','mysql');
      }
      Config::set('database.default',$current_db);
      return $next($request);
    });
  }
  public function index(Request $request){
    if($request->ajax()){
      $users = User::select('users.*', 'taluka.taluka_name_mar as taluka_name', 'departments.department_name_mar as dept_name', 'u2.name as created')
      ->leftJoin('taluka', 'taluka.id', '=', 'users.taluka_id')
      ->leftJoin('departments', 'departments.id', '=', 'users.department_id')
      ->leftJoin('users as u2', 'u2.id', '=', 'users.created_by')
      ->where('users.is_deleted',0)
      ->get();

      return datatables()->of($users)
      ->addIndexColumn()
      ->addColumn('action', function ($row) {
        $btn = '<button type="button" class="btn btn-primary btn-sm" onclick="editRow('.$row->id.')">Edit</a>';
        $btn = $btn.' <button type="button" class="btn btn-danger btn-sm" onclick="deleteConfirmation('.$row->id.')">Delete</a>';
        return $btn;
      })
      ->rawColumns(['action'])
      ->make(true);
    }
    $data['taluka'] = Taluka::all();
    $data['department'] = Department::all();
    $data['role'] = Role::where("role_status",1)->pluck("name","id");
    $data['designation'] = Designation::pluck("designation_name_en","id");
    return view('Admin.user_registration', $data);
  }
  public function show($id){
    return User::where('id',$id)->first();
  }
  public function store(Request $request){
    $data['name'] = $request->name;
    $data['email'] = $request->email;
    $data['phone'] = $request->phone;
    $data['taluka_id'] = $request->taluka;
    $data['department_id'] = $request->department;
    $data['designation_id'] = $request->designation;
    $data['role_id'] = implode(",",$request->roles);
    if($request->user_id > 0){
      if(Request->password && $request->password_confirm)
      {
        $data['password'] = Hash::make($request->password_confirm);
      }
      $user = User::find($request->user_id);
      $user->update($data);
      DB::table('model_has_roles')
            ->where('model_id', $request->user_id)
            ->delete();
      $user->assignRole($request->input('roles'));      
      $msg = 'User Updated Successfully';
    }else{
      $data['password'] = Hash::make($request->password_confirm);
      $user = User::create($data);
      $user->assignRole($request->input('roles'));
      $msg = 'User Created Successfully';
    }
    return redirect()->back();
  }
  public function destroy(Request $request){
    return User::where('id',$request->id)->update(['is_deleted' => 1]);
  }
}
