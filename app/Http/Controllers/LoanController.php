<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\LoanTypes;
use App\Models\LoanPlan;
use App\Models\LoanUser;
use App\Models\User;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['header_title']='Loan List';
        $data['getRecord']=Loan::getAllRecord();
        return view('admin.loan.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['getStaff'] =User::where('is_role',0)->
        where('is_delete',0)->get();
        $data['header_title']='Add Loan ';
        $data['getLoanUser'] =LoanUser::get();
        $data['getLoanTypes']=LoanTypes::get();
        $data['getLoanPlan']=LoanPlan::get();
        return view('admin.loan.add',$data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $loan=new Loan();
        $loan->user_id=trim($request->user_id);
        $loan->staff_id=trim($request->staff_id);
        $loan->loan_types_id=trim($request->loan_types_id);
        $loan->loan_plan_id=trim($request->loan_plan_id);
        $loan->loan_amount=trim($request->loan_amount);
        $loan->purpose=trim($request->purpose);
        $loan->save();

        return redirect('admin/loan/list')->with('success','Loan Created Successfully');
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
    public function edit($id,Request $request){
        $data['getStaff'] =User::where('is_role',0)->
        where('is_delete',0)->get();

        $data['header_title']='Edit Loan ';
        $data['getLoanUser'] =LoanUser::get();
        $data['getLoanTypes']=LoanTypes::get();
        $data['getLoanPlan']=LoanPlan::get();
        $data['getRecord']=Loan::getSingle($id);
        return view('admin.loan.edit',$data);

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $loan=Loan::getSingle($id);
        $loan->user_id=trim($request->user_id);
        $loan->staff_id=trim($request->staff_id);
        $loan->loan_types_id=trim($request->loan_types_id);
        $loan->loan_plan_id=trim($request->loan_plan_id);
        $loan->loan_amount=trim($request->loan_amount);
        $loan->purpose=trim($request->purpose);
        $loan->save();

        return redirect('admin/loan/list')->with('success','Loan Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $loan=Loan::getSingle($id);
        $loan->delete();

        return redirect()->back()->with('success','Record Successfully deleted');
    }
}
