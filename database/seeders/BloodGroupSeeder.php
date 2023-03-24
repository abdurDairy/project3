<?php

namespace Database\Seeders;

use App\Models\BloodGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BloodGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bloodGroup = new BloodGroup();
        $bloodGroup->blood_group_name = "A+";
        $bloodGroup->save();

        $bloodGroup = new BloodGroup();
        $bloodGroup->blood_group_name = "A-";
        $bloodGroup->save();
        
        $bloodGroup = new BloodGroup();
        $bloodGroup->blood_group_name = "B+";
        $bloodGroup->save();

        $bloodGroup = new BloodGroup();
        $bloodGroup->blood_group_name = "B-";
        $bloodGroup->save();

        $bloodGroup = new BloodGroup();
        $bloodGroup->blood_group_name = "AB+";
        $bloodGroup->save();

        $bloodGroup = new BloodGroup();
        $bloodGroup->blood_group_name = "AB-";
        $bloodGroup->save();

        $bloodGroup = new BloodGroup();
        $bloodGroup->blood_group_name = "O+";
        $bloodGroup->save();

        $bloodGroup = new BloodGroup();
        $bloodGroup->blood_group_name = "O-";
        $bloodGroup->save();
    }
}