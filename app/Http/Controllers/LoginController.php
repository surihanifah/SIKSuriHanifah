<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        $data_login = DB::table('login')->get();

    	
    	return view('/login/index',['data_login' => $data_login]);
    }
}
