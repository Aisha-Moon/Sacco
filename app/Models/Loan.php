<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $table='loans';

    static public function getAllRecord(){
        return self::get();
    }
    static public function getsingle($id){
        return self::find($id);
    }
    public function getUserName(){
        return $this->belongsTo(LoanUser::class, 'user_id');
    }
    public function getStaffName(){
        return $this->belongsTo(User::class, 'staff_id');
    }
    public function getLoanType(){
        return $this->belongsTo(LoanTypes::class, 'loan_types_id');
    }
    public function getLoanPlan(){
        return $this->belongsTo(LoanPlan::class, 'loan_plan_id');
    }

}
