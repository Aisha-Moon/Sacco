<?php

namespace App\Http\Controllers;

use App\Models\LoanUser;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoanUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['header_title']='Loan User';
        $data['getRecord']=LoanUser::getAllRecord();
        return view('admin.loan_user.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['header_title']='Add Loan User';

        return view('admin.loan_user.add',$data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $checkEmail=LoanUser::where('email','=',$request->email)->first();
        if($checkEmail){
            return redirect('admin/loan_user/list')->with('error','Loan User Already Exits');

        }else{
        $user=request()->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email'=>'required|unique:loan_users',
            'contact' => 'required',
            'address' => 'required',
            'tax_id' => 'required',
        ]);
        $user=new LoanUser();
        $user->first_name=trim($request->first_name);
        $user->middle_name=trim($request->middle_name);
        $user->last_name=trim($request->last_name);
        $user->address=trim($request->address);
        $user->email=trim($request->email);
        $user->contact=trim($request->contact);
        $user->tax_id=trim($request->tax_id);
        $user->save();
        return redirect('admin/loan_user/list')->with('success','Loan User Added Successfully');

    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['header_title']='Edit Loan User';
        $data['getRecord']=LoanUser::getSingle($id);
        return view('admin.loan_user.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $update=LoanUser::getSingle($id);
        $update->first_name=trim($request->first_name);
        $update->middle_name=trim($request->middle_name);
        $update->last_name=trim($request->last_name);
        $update->address=trim($request->address);
        $update->contact=trim($request->contact);
        $update->email=trim($request->email);
        $update->tax_id=trim($request->tax_id);
        $update->save();
        return redirect('admin/loan_user/list')->with('success','Loan User Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $recordDelete=LoanUser::getSingle($id);
        $recordDelete->delete();

        return redirect()->back()->with('success','Record deleted successfully ');
    }

    //staff
    public function staff_loan_user(Request $request){
        $data['header_title']='Staff Loan User';
        $data['getRecord']=Loan::getLoanStaff(Auth::user()->id);

        return view('admin.admin_staff.staff_loan_user',$data);
    }
    public function staff_loan_delete($id){
        $delete=Loan::find($id);
        $delete->delete();

        return redirect()->back()->with('success','Record deleted successfully ');

    }
}
