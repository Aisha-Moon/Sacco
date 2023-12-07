<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class StaffController extends Controller
{
    public function index(Request $request){
        $data['header_title']='Staff List';

        $data['getRecord']=User::getAllRecord();

        return view('admin.staff.list',$data);
    }
    public function add(Request $request){
        $data['header_title']='Add Staff';

        return view('admin.staff.add',$data);
    }
    public function add_staff(Request $request){

        $staff=request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'email'=>'required|unique:users',
            'is_role' => 'required'
        ]);

        $staff=new User();
        $staff->name=trim($request->name);
        $staff->last_name=trim($request->last_name);
        $staff->surname=trim($request->surname);
        $staff->email=trim($request->email);
        $staff->mobile_number=trim($request->mobile_number);
        $staff->date_of_birth=$request->date_of_birth;
        $staff->is_role=$request->is_role;
        if(!empty($request->file('profile_image'))){
            $file=$request->file('profile_image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('profile/images',$filename);
             $staff->profile_image=$filename;

        }
        $staff->remember_token=Str::random(50);
        $staff->save();
        return redirect('admin/staff/list')->with('success','Account Created Successfully');
    }
    public function edit_staff($id,Request $request){
        $data['header_title']='Edit Staff';

        $data['getRecord']=User::gitSingle($id);
        return view('admin.staff.edit',$data);
    }
    public function update_staff($id,Request $request){

        $staff=request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'email'=>'required|unique:users',
            'is_role' => 'required'
        ]);
        $staff=User::gitSingle($id);
        $staff->name=trim($request->name);
        $staff->last_name=trim($request->last_name);
        $staff->surname=trim($request->surname);
        $staff->email=trim($request->email);
        $staff->mobile_number=trim($request->mobile_number);
        $staff->date_of_birth=$request->date_of_birth;
        $staff->is_role=$request->is_role;
        if(!empty($request->file('profile_image'))){
            if(!empty($staff->file('profile_image') && file_exists('profile/images/'.$staff->file('profile_image')))){
                unlink('profile/images/'.$staff->file('profile_image'));
            }
            $file=$request->file('profile_image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('profile/images',$filename);
             $staff->profile_image=$filename;

        }
        $staff->remember_token=Str::random(50);
        $staff->save();
        return redirect('admin/staff/list')->with('success','Account updated Successfully');


    }
    public function delete_staff($id,Request $request){
        $staffDelete=User::gitSingle($id);
        $staffDelete->is_delete=1;
        $staffDelete->save();
        return redirect()->back()->with('success','Record Deleted Successfully');

    }
}
