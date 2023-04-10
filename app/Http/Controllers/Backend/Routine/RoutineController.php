<?php

namespace App\Http\Controllers\Backend\Routine;

use function Pest\version;
use Illuminate\Http\Request;
use App\Models\RoutineSemester;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Models\RoutineSemesterDetails;

class RoutineController extends Controller
{
    //*##########################__ADD NEW OUTINE ROUTINE__#####################
    public function addRoutine(){
        $semester_data = RoutineSemester::all(); 
        return view('Backend.Routine.addNewRoutine',compact('semester_data'));
    }
    
    //*##########################__INSERT ROUTINE__#############################
    public function indertRoutine(Request $request){

        $request->validate([
            'semester_select' => 'required',
            'section' => 'required',
            'routine_details' => 'required',
        ]);
        // IMAGHE SLIGING 
        // $image_extension = $request->routine_image->extension();
        // $imageName = 'teacher-image-' . $request->routine_image . '-' . $image_extension;
        // $imagePath = $request->routine_image->storeAs('RoutinImagee/', $imageName ,'public');
        // $imageURL = env('APP_URL') . 'storage/' . $imagePath;
        
        $insert_routine_data = new RoutineSemesterDetails();
        $insert_routine_data->routine_semester_id = $request->semester_select;
        $insert_routine_data->section = $request->section;
        $insert_routine_data->routine_details = $request->routine_details;
        $insert_routine_data->save();
        return redirect()->route('list.routine')->with('success','routine inserted');
    }

    //*##########################__LIST ROUTINE__#############################
    public function listRoutine(){
        $listData = RoutineSemesterDetails::latest()->paginate(5);
        return view('Backend.Routine.RoutineList',compact('listData'));
    }

    
    //*##########################__UPDATE ROUTINE PATH__#############################
     public function updateRoutinePath($id)
        {
            $updateRoutine = RoutineSemesterDetails::find($id);
            $semester_data = RoutineSemester::all(); 
            return view('Backend.Routine.editRoutine',compact('semester_data','updateRoutine'));
        }
    
    //*##########################__UPDATE ROUTINE__#############################
    public function updateRoutine(Request $request, $id){
        $updateRoutine = RoutineSemesterDetails::find($id);
        $updateRoutine->routine_semester_id = $request->semester_select;
        $updateRoutine->section = $request->section;
        $updateRoutine->routine_details = $request->routine_details;
        $updateRoutine->save();
        return redirect()->route('list.routine')->with('success','routine updated');
    }
    
     //*##########################_DELETE ROUTINE__#############################
     public function deleteRoutine($id){
        DB::table('routine_semester_details')->where('id', $id)->delete();
        return redirect()->route('list.routine')->with('error','Routine deleted');
  } 
}