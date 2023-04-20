<?php

namespace App\Http\Controllers\Backend\Result;

use Illuminate\Http\Request;
use App\Models\RoutineSemester;
use App\Models\SemesterSubject;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class ResultPublisherController extends Controller
{
    //** ADD NEW SUBJECT 
    public function addNewSubject(){
        $semesterList = RoutineSemester::all();
        return view('Backend.Result.insertSubject', compact('semesterList'));
    }


    // ** INSERT SEMESTER DATA 
    public function insertSubjectData(Request $request){
        $subjectInfo = new SemesterSubject();
        $subjectInfo->routine_semester_id = $request->semester;
        $subjectInfo->Subject_Name = $request->subjectName;
        $subjectInfo->save();
        return redirect()->route('subject.list')->with('success','new subject added!' );
    }

    // ** SUBJECT LIST 
    public function subjectList(){
        $allSubject = SemesterSubject::latest()->get();
        return view('Backend.Result.subjectList',compact('allSubject'));
    }

    // ** SUBJECT EDIT 
    public function subjectEdit($id){
        $editSubject = SemesterSubject::find($id);
        $semesterList = RoutineSemester::all();
        return view('Backend.Result.editSubject', compact('semesterList','editSubject'));
    }

    // ** SUBJECT UPDATE DATA
    public function subjectUpdate(Request $request, $id){
        $subjectInfo = SemesterSubject::find($id);
        $subjectInfo->routine_semester_id = $request->semester;
        $subjectInfo->Subject_Name = $request->subjectName;
        $subjectInfo->save();
        return redirect()->route('subject.list')->with('success','subject updated..!' );
    }
    
    //**SEARCH BUTTON  */
    public function subjectSearch(Request $request){
        if($request->search_for_subject){
            $searchData = SemesterSubject::where('Subject_Name','LIKE','%'.$request->search_for_subject.'%')->latest()->paginate(2);
            return view('Backend.Result.searchResult',compact('searchData'));
        }else{
            return back();
        }
    }

    // ** DELETE BLOOD GROUP 
    public function deleteSubject($id){
        DB::table('semester_subjects')->where('id', $id)->delete();
        return redirect()->route('subject.list')->with('error','a subject deleted');
    }
    
    
}