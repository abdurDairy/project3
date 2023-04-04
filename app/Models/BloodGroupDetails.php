<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodGroupDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'donor_name',
        'donor_birth_date',
        'blood_group_id',
        'donor_department',
        'donor_phone',
    ];
    
    public function blood_Group(){
        return $this->belongsTo(BloodGroup::class);
    }
}