<?php

namespace App\Http\Controllers\Frontend\Result;

use App\Http\Controllers\Controller;
use App\Models\RoutineSemester;
use App\Models\SemesterSubject;
use Illuminate\Http\Request;

class CtResultController extends Controller
{
    public function resultSemester()
    {
        $allSemester = RoutineSemester::all();
        return view('frontend.result.resultSemester',compact('allSemester'));
    }

    // *SUJECT FIND
    public function resultSubject($id)
    {
        $allSubject = RoutineSemester::with('semesterSubject')->find($id);
        return view('frontend.result.resultSubject',compact('allSubject'));
    }
}