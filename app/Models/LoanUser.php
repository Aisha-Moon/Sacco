<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanUser extends Model
{
    use HasFactory;
    protected $table='loan_users';

    static public function getAllRecord(){
        return self::get();
    }

    static public function getsingle($id){
        return self::find($id);
    }
}
