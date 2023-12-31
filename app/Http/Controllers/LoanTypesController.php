<?php

namespace App\Http\Controllers;
use App\Models\LoanTypes;

use Illuminate\Http\Request;

class LoanTypesController extends Controller
{
    public function index(){
        $data['header_title']='Loan Types';
        $data['getRecord']=LoanTypes::getAllRecord();
        return view('admin.loan_types.list',$data);
    }
    public function add(){
        $data['header_title']='Add Loan Types';
        return view('admin.loan_types.add',$data);

    }
    public function store_loan(Request $request){
        $loan=request()->validate([
            'type_name' => 'required',

        ]);
        $loan=new LoanTypes();
        $loan->type_name=trim($request->type_name);
        $loan->description=trim($request->description);
        $loan->save();

        return redirect('admin/loan_types/list')->with('success','Loan Types Added Successfully');
    }
    public function edit_loan_type($id,Request  $request){
        $data['getRecord']=LoanTypes::getSingle($id);

        $data['header_title']='Edit Loan Types';
        return view('admin.loan_types.edit',$data);

    }
    public function delete_loan_type($id,Request $request){
        $loanDelete=LoanTypes::getsingle($id);
        $loanDelete->delete();
        return redirect()->back()->with('success','Loan Types Deleted Successfully');

    }
    public function update_loan_type($id,Request $request) {

        $loan=LoanTypes::getSingle($id);
        $loan->type_name=trim($request->type_name);
        $loan->description=trim($request->description);
        $loan->save();

        return redirect('admin/loan_types/list')->with('success','Loan Types Updated Successfully');
    }
}
