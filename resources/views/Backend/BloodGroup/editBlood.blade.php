@extends('Admin.adminMaster')
@section('general-content')
   <div class="container">
    <div class="row">
        <div class="col-10 mx-auto">
            <div class="card" style="border-radius: 10px;
            /* background: #e0e0e0; */
            box-shadow:  20px 20px 60px #efccf0,
                         -20px -20px 60px #efcff0;">
                <div style="background: #fc0505;" class="card-header text-light position-absolute top-0 end-0">
                    <h1 style="font-weight:bold;">Edit Blood Group Information</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('edit.blood.group.data',$data->id) }}" method="POST" class="px-5">
                        @csrf
                        @method('PUT')
                        <label for="donor_name" style="color:black;font-weight:bold;">Blood Donor Name <span style="color:red;font-weight:bold;">*</span></label>
                        <input value="{{ $data->bloddonor_name }}" name="donor_name" id="donor_name" type="text" class="form-control my-2" placeholder="donor name..">
                      
                        <label for="donor_birth_date" style="color:black;font-weight:bold;">Blood birth date <span style="color:red;font-weight:bold;">*</span></label>
                        <input value="{{ $data->birth_date }}" name="donor_birth_date" id="donor_birth_date" type="date" class="form-control my-2">

                        <label for="blood_group" style="color:black;font-weight:bold;">selecet your blood group <span style="color:red;font-weight:bold;">*</span></label>
                        <select name="blood_group_id" id="blood_group" class="form-control my-2">
                            <option selected disabled value="">select your blood group</option>
                            @foreach ($bloodList as $list)
                                <option value="{{ $list->id }}">{{ $list->blood_group_name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('blood_group_id'))
                            <strong class="text-danger">{{ $errors->first('blood_group_id') }}</strong> <br> <br>
                        @endif
                        
                        <label for="donor_department" style="color:black;font-weight:bold;">donor Department Name <span style="color:red;font-weight:bold;">*</span></label>
                        <input value="{{ $data->department_name }}" name="donor_department" id="donor_department" type="text" class="form-control my-2" placeholder="donor department name..">
                        @if ($errors->has('donor_department'))
                           <strong class="text-danger">{{ $errors->first('donor_department') }}</strong> <br> <br>
                        @endif


                        <label for="donor_phone" style="color:black;font-weight:bold;">donor phone number <span style="color:red;font-weight:bold;">*</span></label>
                        <input value="{{ $data->contact_number }}" name="donor_phone" id="donor_phone" type="number" class="form-control my-2" placeholder="donor name..">
                        @if ($errors->has('donor_phone'))
                          <strong class="text-danger">{{ $errors->first('donor_phone') }}</strong> <br> <br>
                        @endif
                        <button class="btn btn-primary w-100 my-2" type="submit">Submit</button>
                      
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
   </div>
@endsection