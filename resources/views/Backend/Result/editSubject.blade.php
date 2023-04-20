@extends('Admin.adminMaster')
@section('general-content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-7 mx-auto my-5">
                <div class="card">
                    <div class="card-header py-2 text-light" style="background: #065e69;">
                        <h1 style="padding:8px 0 ;">Edit Subject</h1>
                    </div>
                    {{-- * DETAILS * --}}
                    <div class="card-body">
                        <form class="p-5" action="{{ route('subject.update',$editSubject->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label for="semester" style="font-weight:bold;">Select a Semester</label>
                            <select name="semester" id="semester" class="form-control">
                                <option value="" selected disabled>select semester</option>

                                {{-- *** ALL SEMESTER BY FOR EACH LOOP *** --}}
                                @foreach ($semesterList as $semester)
                                    <option value="{{ $semester->id }}">{{ $semester->Semester }}</option>
                                @endforeach
                            </select>

                            <label class="mt-3" style="font-weight:bold;" for="subjectName">Subject Name</label>
                            <input value="{{ $editSubject->Subject_Name }}" name="subjectName" id="subjectName" type="text" class="form-control" placeholder="insert a new subject">

                            <button class="btn mt-3 w-100" style="background: #065e69; border-radius:0;color:#fff;">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('customJS')
    
<script>

</script>
@endpush