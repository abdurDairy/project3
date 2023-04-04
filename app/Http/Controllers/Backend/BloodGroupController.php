<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use App\Models\BloodGroup;
use Illuminate\Http\Request;
use App\Models\BloodGroupDetails;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BloodGroupController extends Controller
{
    public function bloodInfoIndex(){
        $bloodList = BloodGroup::all();
        return view('Backend.BloodGroup.bloodForm',compact('bloodList'));
    }

    // * INSERT NEW BLOOD 
    public function InsertBlood(Request $request){
        $request->validate([
            'donor_name' => 'required',
            'donor_birth_date' => 'required',
            'blood_group_id'=> 'required',
            'donor_phone' => 'required',
            'donor_department' => 'required',
        ]);
        $insertBlood = new BloodGroupDetails();
        $insertBlood->bloddonor_name = $request->donor_name;
        $insertBlood->birth_date = $request->donor_birth_date;
        $insertBlood->blood_group_id = $request->blood_group_id;
        $insertBlood->department_name = $request->donor_department;
        $insertBlood->contact_number = $request->donor_phone;
        $insertBlood->save();
        return redirect()->route('blood.list')->with('success','blood information inserted');
    }

    // ***** BLOOD LIST 
    public function bloodList(){
        $bloodInfoIndex = BloodGroup::with('blood_Group_Info_Details')->get();
        // dd($bloodInfoIndex);
        return view('Backend.BloodGroup.listBloodGroup',compact('bloodInfoIndex'));
    }
    
    // *DETAILS 
    public function bloodDetail(Request $request)
    {
        $bloodDetails = BloodGroupDetails::where('blood_group_id', $request->id)->get();
        return json_encode($bloodDetails);
    }

    // * EDIT BLOOD GROUP 
    public function editBloodGroup($id){
        $data = BloodGroupDetails::find($id);
        $bloodList = BloodGroup::all();
        return view('Backend.BloodGroup.editBlood',compact('data','bloodList'));
    }

    // * BLOOD GROUP EDIT DATA
    public function editBloodGroupData(Request $request,$id){

        $request->validate([
            'donor_name' => 'required',
            'donor_birth_date' => 'required',
            'blood_group_id'=> 'required',
            'donor_phone' => 'required',
            'donor_department' => 'required',
        ]);

        
        $updateBlood = BloodGroupDetails::find($id);
        $updateBlood->bloddonor_name = $request->donor_name;
        $updateBlood->birth_date = $request->donor_birth_date;
        $updateBlood->contact_number = $request->donor_phone;
        $updateBlood->blood_group_id = $request->blood_group_id;
        $updateBlood->department_name = $request->donor_department;
        $updateBlood->save();
    
        return redirect()->route('blood.list')->with('success','blood information updated');
    }

    // * DELETE BLOOD GROUP 
    public function BloodGroupDelete($id){
        DB::table('blood_group_details')->where('id', $id)->delete();
        return redirect()->route('blood.list')->with('error','blood information deleted');
    }
}