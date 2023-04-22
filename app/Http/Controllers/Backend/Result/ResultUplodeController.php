<?php

namespace App\Http\Controllers\Backend\Result;

use App\Http\Controllers\Controller;
use App\Models\ResultDetails;
use App\Models\RoutineSemester;
use App\Models\SemesterSubject;
use Illuminate\Http\Request;
use LDAP\Result;

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

    // *INSERT RESULT AND VALIDATION 
    public function insertResult(Request $request)
    {
        $request->validate([
            'semester' => 'required',
            'subject' => 'required',
            'result_details' => 'required',
        ]);

        // *INSERT RESULT DATA 
        $insertResultData = new ResultDetails();
        $insertResultData->routine_semester_id = $request->semester;
        $insertResultData->semester_subject_id = $request->subject;
        $insertResultData->Result_Details = $request->result_details;
        $insertResultData->save();
        return back();
    }
}