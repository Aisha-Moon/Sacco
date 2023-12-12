<?php

namespace App\Http\Controllers;

use App\Models\LoanPlan;
use App\Models\LoanTypes;
use App\Models\User;
use App\Models\Loan;
use App\Models\LoanUser;
use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request){
        if(Auth::user()->is_role=='1'){
            $data['header_title']='Admin Dashboard';
            $data['getCountOfStaffAdmin']=User::count();
            $data['getLoanTypeCount']=LoanTypes::count();
            $data['getLoanPlansCount']=LoanPlan::count();
            $data['getLoanCount']=Loan::count();
            $data['getLoanUserCount']=LoanUser::count();
            return view('admin.dashboard.list',$data);

        }else if(Auth::user()->is_role=='0'){
            $data['header_title']='Staff';
            $data['getRecord']=User::get();
            return view('admin.admin_staff.dashboard',$data);

        }
    }
    public function profile(Request $request){
        $data['header_title']='Profile';
        $data['getRecord']=User::find(Auth::user()->id);
        return view('admin.profile.update',$data);
    }
    public function profile_update(Request $request){

        $admin=request()->validate([


            'email'=>'required|unique:users,email,'.Auth::user()->id,

        ]);
        $admin=User::find(Auth::user()->id);
        $admin->name=trim($request->name);
        $admin->last_name=trim($request->last_name);
        $admin->surname=trim($request->surname);
        $admin->email=trim($request->email);
        $admin->mobile_number=trim($request->mobile_number);
        $admin->date_of_birth=$request->date_of_birth;
        if(!empty($request->file('profile_image'))){
            if(!empty($admin->file('profile_image') && file_exists('profile/images/'.$admin->file('profile_image')))){
                unlink('profile/images/'.$admin->file('profile_image'));
            }
            $file=$request->file('profile_image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('profile/images',$filename);
             $admin->profile_image=$filename;

        }
        $admin->remember_token=Str::random(50);
        if(!empty($request->password)){
            $admin->password=Hash::make($request->password);
        }
        $admin->save();
        return redirect('admin/profile')->with('success','Account updated Successfully');

    }
    public function staff_profile(Request $request){

        $data['header_title'] ='Profile Update';
        $data['getRecord']=User::find(Auth::user()->id);
        return view('admin.admin_staff.staff_profile',$data);
    }
    public function staff_profile_update(Request $request){
        $staff=request()->validate([
            'email'=>'required|unique:users,email,'.Auth::user()->id,

        ]);
        $staff=User::find(Auth::user()->id);
        $staff->name=trim($request->name);
        $staff->last_name=trim($request->last_name);
        $staff->surname=trim($request->surname);
        $staff->email=trim($request->email);
        if (!empty($request->file('profile_image'))) {
            // Check if the current user has a profile image
            if (!empty($staff->profile_image) && file_exists('profile/images/' . $staff->profile_image)) {
                // If a profile image exists, delete the old file
                unlink('profile/images/' . $staff->profile_image);
            }

            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('profile/images', $filename);

            // Update the user's profile_image property
            $staff->profile_image = $filename;

            // Save the changes to the database
            $staff->save();
        }

        $staff->remember_token=Str::random(50);
        if(!empty($request->password)){
            $staff->password=Hash::make($request->password);
        }
        $staff->save();
        return redirect('staff/profile')->with('success','Account updated Successfully');

    }
    public function website_logo(Request $request){
        $data['header_title']='Update Logo';
        $data['getRecord']= Logo::find(1);
        return view('admin.logo.update',$data);
    }
    public function logo_update(Request $request){
        $logo=Logo::find(1);
        $logo->name=trim($request->name);
        if(!empty($request->file('logo'))){
            if (!empty($logo->logo) && file_exists('logo/images/' . $logo->logo)) {
                // If a profile image exists, delete the old file
                unlink('logo/images/' . $logo->logo);
            }
            $file=$request->file('logo');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('logo/images',$filename);
             $logo->logo=$filename;

        }
        $logo->save();
        return redirect('admin/logo')->with('success', 'Logo saved successfully');
    }
}
