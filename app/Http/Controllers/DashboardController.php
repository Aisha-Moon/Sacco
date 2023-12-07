<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request){
        if(Auth::user()->is_role=='1'){
            $data['header_title']='Admin Dashboard';

            return view('admin.dashboard.list',$data);

        }else if(Auth::user()->is_role=='0'){
            $data['header_title']='Admin Staff';

            return view('admin.staff.list',$data);

        }
    }
}
