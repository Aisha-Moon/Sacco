<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(){
        $data['header_title']='Login';
        return view('auth.login',$data);
    }
    public function register(Request $request){
        $data['header_title']='Register';

        return view('auth.register',$data);
    }
    public function forgot(Request $request){
        $data['header_title']='Forgot Password';

        return view('auth.forgot',$data);
    }
    public function register_post(Request $request){

        $user=request()->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:6',

        ]);

        $user=new User();
        $user->name=trim($request->name);
        $user->last_name=trim($request->last_name);
        $user->email=trim($request->email);
        $user->password=Hash::make($request->password);
        $user->remember_token=Str::random(50);
        $user->save();
        return redirect('/')->with('success','Registration successful');
    }
    public function login_post(Request $request){
        // dd($request->all());

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],true)){
            if(Auth::user()->is_role=='1'){
                return redirect()->intended('admin/dashboard');
            }else if(Auth::user()->is_role=='0'){
                return redirect()->intended('staff/dashboard');

            }else{
                return redirect()->back()->with('error','Incorrect Credentials');
            }
        }else{
            return redirect()->back()->with('error','Incorrect Credentials');

        }
    }
    public function logout(){
        Auth::logout();

        return redirect(url('/'));
    }

}
