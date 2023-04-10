<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Teachers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    // ** FRONTEND HOME CONTROLLER
    public function home(){
        $teacher_info = Teachers::all();

        return view('index',compact('teacher_info'));
    }

    // ** HOME TEACHERS DETAILS 
    public function homeEdit($id){
        $teacherDetailsdata = Teachers::find($id);
        // $data = Str::slug($teacherDetailsdata->teacher_name);
        // dd($data);
        return view('frontend.home.teacherProfile',compact('teacherDetailsdata'));
      }
    
}