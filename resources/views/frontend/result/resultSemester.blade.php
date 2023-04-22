@extends('frontend.navFooter')
@section('home.content')
    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <div class="header" style="display:inline-block;">
                    <h2 style="background: #6e0c77; padding:2px 10px;border-radius:0px;color:#fff; font-size:15px;">select your semester for checking your result.</h2>
                </div>

                {{-- *ALL SEMESTER* --}}
                <div class="row">
                    @foreach ($allSemester as $semesterData)
                        <div class="col-md-4">
                            <a href="{{ route('resultsubject.index',$semesterData->Semester) }}">
                                <div class="card p-5 my-3" style="background:#087508; color:#fff;font-weight:bold;text-align:center; font-size:16px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                                    {{ $semesterData->Semester }}
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection