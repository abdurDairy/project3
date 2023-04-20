@extends('Admin.adminMaster')
@section('general-content')
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
                <div class="card">
                    <div class="card-header my-3" style="display:flex;">
                        <h1 style="font-weight:;font-size:15px;background:#075cbd;color:#fff;padding:5px 10px;display:block;border-radius:20px;">Result Upload Panel</h1>
                    </div>

                    {{-- *RESULT DETAILS* --}}
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf 

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="semester">Select a Semester <span style="color:red;font-weight:bold;">*</span> </label>
                                        <select name="semester" id="semester" name="semester" class="form-control mb-2">
                                            <option value="" selected disabled>Select a Semester</option>

                                            @foreach ($allSemester as $semester)
                                                <option value="{{ $semester->id }}">{{ $semester->Semester }}</option>
                                            @endforeach
                                        </select>
                                        {{-- *ERROR MESSAGE SHOW* --}}
                                        @error('semester')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                </div>


                                <div class="col-lg-6">
                                    <label for="subject">Select a Subject <span style="color:red;font-weight:bold;">*</span></label>
                                    <select name="subject" id="subject" name="subject" class="form-control">
                                        <option value="" selected disabled>Select a Subject</option>
        
                                        @foreach ($allSubject as $subjectData)
                                            <option value="{{ $subjectData->routine_semester_id  }}">{{ $subjectData->Subject_Name  }}</option>
                                        @endforeach
                                    </select>
                                    {{-- *ERROR MESSAGE SHOW* --}}
                                    @error('subject')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>



                        

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('customJS')
    <script>
        $('#semester').on('change', function(){
          let SemesterCategory = $(this).val()
            // *AJAX START 
            $.ajax({
                url: `{{ route('select.subject') }}`,
                methos: 'GET',
                data:{
                    id: SemesterCategory
                },
                success: function(responce){
                   let Subjectdata = JSON.parse(responce)
                   let options = []; 

                   Subjectdata.forEach(subject => {
                      let optionElement = `<option value="${subject.id}">${subject.Subject_Name}</option>`
                      options.push(optionElement)
                   });
                   $('#subject').html(options)
                },
            });
        });
    </script>
@endpush