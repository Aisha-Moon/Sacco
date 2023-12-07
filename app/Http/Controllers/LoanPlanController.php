<?php

namespace App\Http\Controllers;

use App\Models\LoanPlan;
use Illuminate\Http\Request;

class LoanPlanController extends Controller
{
   public function index(){
    $data['header_title']='Loan Plans';
    $data['getRecord']=LoanPlan::getAllRecord();
    return view('admin.loan_plan.list',$data);
   }
   public function add(){
    $data['header_title']='Add Loan Plans';
    return view('admin.loan_plan.add',$data);

   }
   public function store(Request $request){

    $loan=new LoanPlan();
    $loan->months=trim($request->months);
    $loan->interest_percentage=trim($request->interest_percentage);
    $loan->penalty_rate=trim($request->penalty_rate);
    $loan->save();

    return redirect('admin/loan_plan/list')->with('success','Loan Plans Added Successfully ');
}
    public function edit($id,Request $request){
        $data['header_title']='Edit Loan Plans';
        $data['getRecord']=LoanPlan::getSingle($id);

        return view('admin.loan_plan.edit',$data);

    }
    public function update($id,Request $request){
        $loan=LoanPlan::getSingle($id);
        $loan->months=trim($request->months);
        $loan->interest_percentage=trim($request->interest_percentage);
        $loan->penalty_rate=trim($request->penalty_rate);
        $loan->save();

        return redirect('admin/loan_plan/list')->with('success','Loan Plans Successfully Updated');

    }
    public function delete($id){
        $deletePlan=LoanPlan::getSingle($id);
        $deletePlan->delete();
        return redirect()->back()->with('success','Loan Plans Deleted Successfully');

    }

}
