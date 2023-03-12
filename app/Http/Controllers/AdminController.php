<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function Index(){
        return view('Admin.adminLogin');
    }
    //*** DASHBORD 
    public function Dashbord(){
        return view('Admin.index');
    }

    /**
     * //*ADMIN  
     * 
     */
    public function Login(Request $request){
        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email' => $check['admin_email'], 'password' => $check['admin_pass'] ])){
           return redirect()->route('admin.dashbord');
        }else{
            return back()->with('error','email or password not match');
        }
    }

    /**
     * /* *** ADMIN LOGOUT 
     */
    public function AdminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('login.form')->with('success','Admin logout successfully !');
    }
    
    /**
     * /* ADMIN REGISTER 
     */
    public function Register(){
        return view('Admin.adminRegister');
    }

    /**
     *  NEW ADMIN CREATE
     * 
     */
    public function RegisterCreate(Request $request){
        $insertNewAdmin = new Admin();
        $insertNewAdmin->name = $request->name;
        $insertNewAdmin->email  = $request->email ;
        if($request->password == $request->con_password){
            $insertNewAdmin->password = Hash::make($request->password);
            $insertNewAdmin->save();
        }else{
            return redirect()->route('admin.register')->with('error','password not match');
        }
        $insertNewAdmin->created_at = Carbon::now();
        $insertNewAdmin->save();
        return redirect()->route('login.form')->with('success','Admin Created Successfully');

    }
}