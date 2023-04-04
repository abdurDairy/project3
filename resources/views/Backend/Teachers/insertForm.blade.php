@extends('Admin.adminMaster')

@push('summernoteCSS')
        <!-- include summernote css/js -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush


@push('bootstrapCSS')
       {{-- BOOTSTRAP CSS --}}
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endpush


@section('general-content')
   <div class="container">
    <div class="row">
        <div class="col-10 mx-auto">
            <div class="card" style="border-radius: 10px;
            /* background: #e0e0e0; */
            box-shadow:  20px 20px 60px #efccf0,
                         -20px -20px 60px #efcff0;">
                <div style="background: #6a23ee;" class="card-header text-light position-absolute top-0 end-0">
                    <h1 style="font-weight:bold;">Teacher Information</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route("insert.teacher.data") }}" method="POST" enctype="multipart/form-data" class="px-5">
                        @csrf
                        <label for="teacher_name" style="color:black;font-weight:bold;">Teacher Name <span style="color:red;font-weight:bold;">*</span></label>
                        <input name="teacher_name" id="teacher_name" type="text" class="form-control my-2" placeholder="donor name..">
                        @if ($errors->has('teacher_name'))
                           <strong class="text-danger">{{ $errors->first('teacher_name') }}</strong> <br> <br>
                        @endif


                        <label for="teacher_designetion" style="color:black;font-weight:bold;">Designation<span style="color:red;font-weight:bold;">*</span></label>
                        <input name="teacher_designetion" id="teacher_designetion" type="text" class="form-control my-2" placeholder="donor department name..">
                        @if ($errors->has('teacher_designetion'))
                           <strong class="text-danger">{{ $errors->first('teacher_designetion') }}</strong> <br> <br>
                        @endif

                        
                        <label for="accademic_profile" style="color:black;font-weight:bold;">Accademic Profile<span style="color:red;font-weight:bold;">*</span></label>
                        <textarea name="accademic_profile" id="accademic_profile" cols="30" rows="10" class="form-control"></textarea>
                        @if ($errors->has('accademic_profile'))
                          <strong class="text-danger">{{ $errors->first('accademic_profile') }}</strong> <br> <br>
                        @endif


                        <label for="biography" style="color:black;font-weight:bold;">Your Biography<span style="color:red;font-weight:bold;">*</span></label>
                        <textarea name="biography" id="biography" cols="30" rows="10" class="form-control"></textarea>
                        @if ($errors->has('biography'))
                           <strong class="text-danger">{{ $errors->first('biography') }}</strong> <br> <br>
                        @endif


                        <label for="research_areas" style="color:black;font-weight:bold;">Your Reasearch Area<span style="color:red;font-weight:bold;">*</span></label>
                        {{-- <input name="research_areas" id="research_areas" type="text" class="form-control my-2" placeholder="insert your research areas"> --}}
                        <textarea name="research_areas" id="research_areas" cols="30" rows="10" class="form-control"></textarea>
                        @if ($errors->has('research_areas'))
                           <strong class="text-danger">{{ $errors->first('research_areas') }}</strong> <br> <br>
                        @endif


                        <label for="teaching_subject" style="color:black;font-weight:bold;">Your teaching subject list<span style="color:red;font-weight:bold;">*</span></label>
                        <textarea name="teaching_subject" id="teaching_subject" cols="30" rows="10" class="form-control"></textarea>
                        @if ($errors->has('teaching_subject'))
                           <strong class="text-danger">{{ $errors->first('teaching_subject') }}</strong> <br> <br>
                        @endif

                        <label for="teacher_image" style="color:black;font-weight:bold;">Your Image<span style="color:red;font-weight:bold;">*</span></label>
                        <input name="teacher_image" id="teacher_image" type="file" class="form-control my-2">
                        @if ($errors->has('teacher_image'))
                          <strong class="text-danger">{{ $errors->first('teacher_image') }}</strong> <br> <br>
                        @endif


                        <label for="teacher_phone" style="color:black;font-weight:bold;">contact number<span style="color:red;font-weight:bold;">*</span></label>
                        <input name="teacher_phone" id="teacher_phone" type="number" class="form-control my-2" placeholder="insert your phone number">
                        @if ($errors->has('teacher_phone'))
                          <strong class="text-danger">{{ $errors->first('teacher_phone') }}</strong> <br> <br>
                        @endif


                        <label for="teacher_email" style="color:black;font-weight:bold;">Your Email<span style="color:red;font-weight:bold;">*</label>
                        <input name="teacher_email" id="teacher_email" type="email" class="form-control my-2" placeholder="insert your phone number">
                        @if ($errors->has('teacher_email'))
                          <strong class="text-danger">{{ $errors->first('teacher_email') }}</strong> <br> <br>
                        @endif

                        
                        <label for="teacher_facebook" style="color:black;font-weight:bold;">Your FaceBook Link</label>
                        <input name="teacher_facebook" id="teacher_facebook" type="text" class="form-control my-2" placeholder="insert your Facebook Profile Link">
                        
                        <label for="teacher_youtube" style="color:black;font-weight:bold;">Your YouTube Profile Link</label>
                        <input name="teacher_youtube" id="teacher_youtube" type="text" class="form-control my-2" placeholder="insert your YouTube Profile Link">
                        
                        <label for="teacher_linkedin" style="color:black;font-weight:bold;">Your Linkedin Profile Link</label>
                        <input name="teacher_linkedin" id="teacher_linkedin" type="text" class="form-control my-2" placeholder="insert your Linkedin Profile Link">
                        
                        <button class="btn btn-primary w-100 my-2" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   </div>
@endsection

{{-- BOOTSTRAP JS --}}
@push('bootstrapJS')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endpush


@push('summernoteJS')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $('#accademic_profile, #biography , #teaching_subject, #research_areas').summernote({
      placeholder: 'Insert Your Accademic Profile..',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['font', ['bold', 'underline']],
        ['color', ['color']],
        ['table', ['table']],
        ['insert', ['link']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['view', ['codeview']]
      ]
    });

  </script>
@endpush