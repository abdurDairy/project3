<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodGroup extends Model
{
    use HasFactory;

    public function blood_Group_Info_Details(){
        return $this->hasMany(BloodGroupDetails::class);
    }
}