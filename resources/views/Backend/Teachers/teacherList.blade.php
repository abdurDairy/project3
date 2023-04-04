@extends('Admin.adminMaster')
@section('general-content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-info text-light">Teachers List</div>
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                     @endif
                    @if(Session::has('error'))
                        <div class="alert alert-danger">
                            {{Session::get('error')}}
                        </div>
                     @endif
                    <div class="card-body">
                        <table class="table table-responsive table-hover table-success">
                            <thead class="thead-dark">
                            <tr>
                                <td>SN</td>
                                <td>Name</td>
                                <td>Designation</td>
                                <td>Acc. Profile</td>
                                <td>Biography</td>
                                <td>Research Area</td>
                                <td>Teaching Subject</td>
                                <td>Image</td>
                                <td>Phone</td>
                                <td>Email</td>
                                <td>Facebook</td>
                                <td>Youtube</td>
                                <td>Linkedin</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allTeachers as $key => $teacherData)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $teacherData->teacher_name }}</td>
                                <td>{{ $teacherData->teacher_designetion }}</td>
                                <td>{!! $teacherData->accademic_profile	 !!}</td>
                                <td>{!! $teacherData->biography !!}</td>
                                <td>{!! $teacherData->research_areas !!}</td>
                                <td>{!! $teacherData->teaching_subject !!}</td>
                                <td>
                                    <img src="{{ $teacherData->teacher_image }}" style="width: 100px;" alt="{{ $teacherData->teacher_name }}">
                                </td>
                                <td>{{ $teacherData->teacher_phone }}</td>
                                <td>{{ $teacherData->teacher_email }}</td>


                                @if ($teacherData->teacher_facebook == null)
                                     <td><strong class="text-danger">no data found</strong></td>
                                @else
                                     <td>{{ $teacherData->teacher_facebook }}</td>
                                @endif


                                @if ($teacherData->teacher_youtube == null)
                                     <td><strong class="text-danger">no data found</strong></td>
                                @else
                                     <td>{{ $teacherData->teacher_youtube }}</td>
                                @endif


                               
                                
                                @if ($teacherData->teacher_linkedin == null)
                                     <td><strong class="text-danger">no data found</strong></td>
                                @else
                                    <td>{{ $teacherData->teacher_linkedin }}</td>
                                @endif


                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('teacher.edit' ,$teacherData->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{ route('teacher.delete',$teacherData->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                        <div class="row mt-3" style="padding:5px 0; background:#b4dddd;">
                            {!! $allTeachers->withQueryString()->links('pagination::bootstrap-4') !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection