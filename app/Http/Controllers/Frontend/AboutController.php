<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Teachers;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function aboutEte(){
        // *TEACHERS INFO 
        $teacher_info = Teachers::all();
        return view('frontend.about.aboutIndex',compact('teacher_info'));
    }

    
    
}