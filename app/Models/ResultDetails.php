<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultDetails extends Model
{
    use HasFactory;
    
    public function ResultDetails(){
        return $this->belongsTo(SemesterSubject::class);
    }
}