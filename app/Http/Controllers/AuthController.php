<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


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
    public function forgot_pass(Request $request){
        $count=User::where('email',$request->email)->count();
        if($count>0){
            $user=User::where('email',$request->email)->first();
            $random_pass=rand(111111,999999);
            $user->password=Hash::make($random_pass);
            $user->save();
            $user->random_pass=$random_pass;

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect('/')->with('success','Reset Password mail has been sent');
        }else{
            return redirect()->back()->with('error','Email Not found');
        }
    }

}
