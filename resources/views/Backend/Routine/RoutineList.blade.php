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
                                <td>Semester</td>
                                <td>Section</td>
                                <td>Routine</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listData as $key => $data)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $data->routine_semester_id  }}</td>
                                <td>{!! $data->section !!}</td>
                                <td>{!! $data->routine_details !!}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('upated.routine.path',$data->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{ route('delete.routine',$data->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>

                        <div class="row mt-3" style="padding:5px 0; background:#b4dddd;">
                            {!! $listData->withQueryString()->links('pagination::bootstrap-4') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection