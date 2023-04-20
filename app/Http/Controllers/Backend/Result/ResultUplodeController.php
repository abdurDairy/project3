<?php

namespace App\Http\Controllers\Backend\Result;

use App\Http\Controllers\Controller;
use App\Models\RoutineSemester;
use App\Models\SemesterSubject;
use Illuminate\Http\Request;

class ResultUplodeController extends Controller
{
    public function uploadResult(){
        $allSemester = RoutineSemester::all();
        $allSubject = SemesterSubject::all();
        return view('Backend.Result.resultUpload',compact('allSemester','allSubject'));
    }

    // * SUB CATEGORY I MEAN SUBJECT SELECT 
    public function selectSubject(Request $request){
        $subjectSubCategory = SemesterSubject::where('routine_semester_id', $request->id)->get();
        return  json_encode($subjectSubCategory);
    }
}