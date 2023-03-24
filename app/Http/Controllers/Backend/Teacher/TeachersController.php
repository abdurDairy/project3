<?php

namespace App\Http\Controllers\Backend\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teachers;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
  //** ADD TEACHER 
  public function addTeacher(){
    return view('Backend.Teachers.insertForm');
  }  

  // ** INSERT TEACHER DATA
  public function insertTeacherData(Request $request){
    
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
     return back();
  }
}