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
  public function index(){
    return view('Closedaccount/accclosedform');
  }
}
