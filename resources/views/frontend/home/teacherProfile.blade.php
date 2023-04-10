@extends('frontend.navFooter')
@section('home.content')


<div class="breadcrumb-area">
    <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-2 pt-100 pb-95" style="background-image:url({{ asset('assets/img/bg/breadcrumb-bg-2.jpg') }});">
        <div class="container">
            <h2>{{ $teacherDetailsdata->teacher_name }}</h2>
            <p>Electronics & Telecommunication Engineering (ETE)</p>
            <p>International Islamic University Chittagong (IIUC)</p>
        </div>
    </div>
    <div class="breadcrumb-bottom">
        <div class="container">
            <ul>
                <li><a href="{{ route('index') }}">Home</a> <span><i class="fa fa-angle-double-right"></i>{{ $teacherDetailsdata->teacher_name }} Profile</span></li>
            </ul>
        </div>
    </div>
</div>


   <div class="container-fluid mt-5">
                {{-- TEACHER PROFILE DETAILS  --}}
                    <div class="row mx-auto">

                        <div class="col-lg-2"></div>
                        <div class="col-lg-3">
                            <div class="card" style="border-radius:0;!importent; overflow: hidden; height:360px;width:360px; background-position:center;">
                                <img class="" src="{{ $teacherDetailsdata->teacher_image }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                             <div class="containts">
                                <h2 style="color: #0f3d57;font-weight:bold;">{{ $teacherDetailsdata->teacher_name }}</h2>
                                <strong style="font-size: 20px;">{{ $teacherDetailsdata->teacher_designetion }}</strong>

                                <div class="accademic-profile mt-3">
                                    <h3 style="color: #0f3d57;font-weight:bold;">Academic Profile</h3>
                                    {!! $teacherDetailsdata->accademic_profile !!}
                                </div>

                                <div class="accademic-profil my-3">
                                    <strong style="font-size: 20px; color:#0e6829;text-decoration: underline;">Phone : </strong><span style="font-size: 20px;"><a href="tel:{{ $teacherDetailsdata->teacher_phone }}">{{ $teacherDetailsdata->teacher_phone }}</a></span> <br>
                                    <strong style="font-size: 20px; color:#0e6829;text-decoration: underline;">Email : </strong><span style="font-size: 20px;">{{ $teacherDetailsdata->teacher_email }}</span> <br>
                                </div>

                                <div class="accademic-profile">
                                    <h3 style="color: #0f3d57;font-weight:bold;">Biography</h3>
                                    <p>{!! $teacherDetailsdata->biography !!}</p>
                                </div>

                                <div class="accademic-profile">
                                    <h3 style="color: #0f3d57;font-weight:bold;">Research Areas</h3>
                                    <p>{!! $teacherDetailsdata->research_areas !!}</p>
                                </div>

                                <div class="accademic-profile">
                                    <h3 style="color: #0f3d57;font-weight:bold;">Teaching</h3>
                                    <p>{!! $teacherDetailsdata->teaching_subject !!}</p>
                                </div>

                                <div class="accademic-profile mb-5">
                                    <h3 style="color: #0f3d57;font-weight:bold;">Social Media</h3>
                                    <a class="btn" style="background: #4267B2; padding:8px 15px; color:antiquewhite; border-radius:0;!importent;" href="{{ $teacherDetailsdata->teacher_facebook }}">Facebook</a>
                                    <a class="btn" style="background: #FF0000; padding:8px 15px; color:antiquewhite; border-radius:0;!importent;" href="{{ $teacherDetailsdata->teacher_youtube }}">YouTube</a>
                                    <a class="btn" style="background: #0072b1; padding:8px 15px; color:antiquewhite; border-radius:0;!importent;" href="{{ $teacherDetailsdata->teacher_linkedin }}">Linkedin</a>
                                </div>
                             </div>
                        </div>
                    </div>
@endsection