<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function application_form()
    {
        return view('Application.application_form');
    }
}
