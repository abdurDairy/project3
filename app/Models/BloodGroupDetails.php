<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodGroupDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'bloddonor_name',
        'blood_group_id',
        'donor_phone',
        'donor_department',
    ];
    public function blood_Group(){
        return $this->belongsTo(BloodGroup::class);
    }
}