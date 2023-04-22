<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoutineSemester extends Model
{
    use HasFactory;
    public function Routine_Details(){
        return $this->hasMany(RoutineSemesterDetails::class);
    }
    
    public function semesterSubject(){
        return $this->hasMany(SemesterSubject::class);
    }
 
}