@extends('Admin.adminMaster')
{{-- *SEARCH CONTENT* --}}
@section('search-missing-fitch')
<div class="search ">
    <form action="{{ route('subject.search') }}" method="GET">
        @csrf
        <input value="{{ Request::get('search_for_subject') }}" type="text" class="search__input form-control border-transparent" name="search_for_subject" placeholder="Search...">
        <button type="submit" style="display:flex;">
            <i data-feather="search" class="search__icon dark-text-gray-300"></i>
        </button> 
    </form>
</div>
@endsection

@section('general-content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-8 mx-auto">
                <div class="card">
                    <div class="card-header py-2 text-light" style="background: #065e69;">
                        <h1 style="padding:8px 0 ;">Subject List</h1>
                    </div>

                        <table class="table table-responsive table-bordered table-hover"> 
                           <tr>
                                <th>SN</th>
                                <th>Subject Name</th>
                                <th>Semester</th>
                                <th>Action</th>
                           </tr>

                           @foreach ($searchData as $key=> $subject)
                               <tr>
                                  <td>{{ ++$key; }}</td>
                                  <td>{{ $subject->Subject_Name }}</td>
                                  <td>{{ $subject->routine_semester_id }}
                                     @if ($subject->routine_semester_id == 2)
                                         {{ "'nd Semester" }}
                                     @elseif ($subject->routine_semester_id == 1)
                                         {{ "'st semester" }}
                                     @else
                                         {{ "'th semester" }}
                                     @endif
                                    </td>
                                  <td>
                                    <div class="btn-group">
                                        <a href="{{ route('subject.edit', $subject->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('delete.subject', $subject->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                  </td>
                               </tr>
                           @endforeach
                        </table>
                        {{-- <div class="row p-2">
                            {{ $searchData->links() }}
                        </div> --}}

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection