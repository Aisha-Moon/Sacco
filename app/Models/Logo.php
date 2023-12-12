<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;
    protected $table='logos';

    public function getLogo(){
        if(!empty($this->logo) && file_exists('logo/images/' . $this->logo)){
            return url('logo/images/' .$this->logo);

        }
    }

}
