<?php

namespace Database\Seeders;

use App\Models\RoutineSemester;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoutineSemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $SemesterForRoutine= new RoutineSemester();
        $SemesterForRoutine->semester = "1st-Semester";
        $SemesterForRoutine->save();
        
        $SemesterForRoutine= new RoutineSemester();
        $SemesterForRoutine->semester = "2nd-Semester";
        $SemesterForRoutine->save();
        
        $SemesterForRoutine= new RoutineSemester();
        $SemesterForRoutine->semester = "3rd-Semester";
        $SemesterForRoutine->save();
        
        $SemesterForRoutine= new RoutineSemester();
        $SemesterForRoutine->semester = "4th-Semester";
        $SemesterForRoutine->save();
        
        $SemesterForRoutine= new RoutineSemester();
        $SemesterForRoutine->semester = "5th-Semester";
        $SemesterForRoutine->save();
        
        $SemesterForRoutine= new RoutineSemester();
        $SemesterForRoutine->semester = "6th-Semester";
        $SemesterForRoutine->save();
        
        $SemesterForRoutine= new RoutineSemester();
        $SemesterForRoutine->semester = "7th-Semester";
        $SemesterForRoutine->save();
        
        $SemesterForRoutine= new RoutineSemester();
        $SemesterForRoutine->semester = "8th-Semester";
        $SemesterForRoutine->save();
    }
}