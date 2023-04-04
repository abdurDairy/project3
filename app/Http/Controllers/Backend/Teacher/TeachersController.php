<?php

namespace App\Http\Controllers\Backend\Teacher;

use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class TeachersController extends Controller
{
  //** ADD TEACHER 
  public function addTeacher(){
    return view('Backend.Teachers.insertForm');
  }  

  // ** INSERT TEACHER DATA
  public function insertTeacherData(Request $request){
    
    // * VALIDATION 
    $request->validate([
      'teacher_name' => 'required',
      'teacher_designetion' => 'required',
      'accademic_profile' => 'required',
      'teacher_image' => 'required',
      'biography' => 'required',
      'research_areas' => 'required',
      'teaching_subject' => 'required',
      'teacher_phone' => 'required',
      'teacher_email' => 'required|email|unique:teachers',
    ]);
    
    // ** IMAGHE SLIGING 
      $image_extension = $request->teacher_image->extension();
      $imageName = 'teacher-image-' . $request->teacher_name . '-' . $image_extension;
      $imagePath = $request->teacher_image->storeAs('Teachers/', $imageName ,'public');
      $imageURL = env('APP_URL') . 'storage/' . $imagePath;
        
     $inserTeachersData = new Teachers();
     $inserTeachersData->teacher_name = $request->teacher_name;
     $inserTeachersData->teacher_designetion = $request->teacher_designetion;
     $inserTeachersData->accademic_profile = $request->accademic_profile;
     $inserTeachersData->teacher_image = $imageURL;
     $inserTeachersData->biography = $request->biography;
     $inserTeachersData->research_areas = $request->research_areas;
     $inserTeachersData->teaching_subject = $request->teaching_subject;
     $inserTeachersData->teacher_phone = $request->teacher_phone;
     $inserTeachersData->teacher_email = $request->teacher_email;
     $inserTeachersData->teacher_facebook = $request->teacher_facebook;
     $inserTeachersData->teacher_youtube = $request->teacher_youtube;
     $inserTeachersData->teacher_linkedin = $request->teacher_linkedin;
     $inserTeachersData->teacher_designetion = $request->teacher_designetion;
     $inserTeachersData->save();
     return redirect()->route('teacher.list')->with('success', 'teacher data inserted!');
  }


  // *TEACHER LIST 
  public function TeacherList(){
    $allTeachers = Teachers::latest()->paginate(5);
    return view('Backend.Teachers.teacherList',compact('allTeachers'));
  }


  // ** TEACHER PROFILE EDIT
  public function TeacherEdit($id){
    $data = Teachers::find($id);
    return view('Backend.Teachers.editTeacherProfile',compact('data'));
  }

  // ** TEACHER EDIT DATA
  public function TeacherEditData(Request $request,$id){

    // ** VALIDATE 
    // $request->validate(
    //   [
    //   'teacher_image' => 'required|mimes:png,jpg,jpeg',
    //   ]);
    
    $updatedata = Teachers::find($id);

    if($request->hasFile('teacher_image')){
          // ** IMAGHE SLIGING 
          $image_extension = $request->teacher_image->extension();
          $imageName = 'teacher-image-' . $request->teacher_name . '-' . $image_extension;
          $imagePath = $request->teacher_image->storeAs('Teachers/', $imageName ,'public');
          $imageURL = env('APP_URL') . 'storage/' . $imagePath;
          
          // * EXISTING FILE DELETE
          if(File::exists($imageURL)){
            File::delete($imageURL);
          }
          $updatedata->teacher_image = $imageURL;
    }
    
     $updatedata->teacher_name = $request->teacher_name;
     $updatedata->teacher_designetion = $request->teacher_designetion;
     $updatedata->accademic_profile = $request->accademic_profile;
     $updatedata->biography = $request->biography;
     $updatedata->research_areas = $request->research_areas;
     $updatedata->teaching_subject = $request->teaching_subject;
     $updatedata->teacher_phone = $request->teacher_phone;
     $updatedata->teacher_email = $request->teacher_email;
     $updatedata->teacher_facebook = $request->teacher_facebook;
     $updatedata->teacher_youtube = $request->teacher_youtube;
     $updatedata->teacher_linkedin = $request->teacher_linkedin;
     $updatedata->teacher_designetion = $request->teacher_designetion;
     $updatedata->save();
     return redirect()->route('teacher.list')->with('success', 'teacher data upated!');
  }

  // ** TEACHER DELETE
  public function TeacherDelete($id){
        DB::table('teachers')->where('id', $id)->delete();
        return redirect()->route('teacher.list')->with('error','Teacher Profile deleted');
  } 
}