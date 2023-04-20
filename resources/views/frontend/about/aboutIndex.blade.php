@extends('frontend.navFooter')
@section('home.content')

{{--** ABOUT HEADER **--}}
<div class="breadcrumb-area">
    <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-2 pt-100 pb-95" style="background-image:url({{ asset('assets/img/bg/breadcrumb-bg-2.jpg') }});">
        <div class="container">
            <h2>About <span style="color: rgb(219, 216, 10)">ETE</span> department </h2>
            <p>It is the one of the renowned department of international islamic university chittagong. it has Established in 03.03.2010 (Male) in permanent campus, Chittagong.Started with 30 students & few teachers and staffs.</p>
        </div>
    </div>
    <div class="breadcrumb-bottom">
        <div class="container">
            <ul>
                <li><a href="{{ route('index') }}">Home</a> <span><i class="fa fa-angle-double-right"></i>about ETE</span></li>
            </ul>
        </div>
    </div>
</div>


  <div class="container">
    <div class="row">
        <div class="col-12 py-5">
            <div class="section-title mb-55">
                <h2>History of the ETE department</h2>
                <p>It is the one of the renowned department of international islamic university chittagong. it has Established in 03.03.2010 (Male) in permanent campus.</p>
            </div>
            <div class="list-history px-5">
                <ul style="list-style-type: square; font-size:17px;">
                    <li>The Department applied for an IEB accredited undergraduate program namely Electronic and Telecommunication Engineering (ETE)</li>
                    <li>Established in 03.03.2010 (Male) in permanent campus, Chittagong.</li>
                    <li>Started with 30 students & few teachers and staffs.</li>
                    <li>Enrollment is twice a year for the Bachelor Programs.</li>
                    <li>It follows the open credit hour system.</li>
                    <li>In ETE, students need 4 years for completing graduation. Each year includes 2 semesters.</li>
                    <li>IEEE IIUC Student Branch has been formed at Autumn-2016.</li>
                    <li>Currently about 400 students are studying in this dept.</li>
                    <li>Experienced and Rich Regular Faculty Members with foreign degrees.</li>
                    <li>Wi-Fi connected Department.</li>
                    <li>Its Syllabus and Curriculum is International standard.</li>
                    <li>Department has a well-structured Telecom Club run by the students with active supervision of the teachers.</li>
                </ul>
            </div>
        </div>
    </div>
  </div>
  {{-- *STUDENT SURVEY  --}}
  <div class="fun-fact-area bg-img pt-130 pb-100" style="background-image:url({{ asset('assets/img/bg/bg-6.jpg') }});">
    <div class="container">
        <div class="section-title-3 section-shape-hm2-2 white-text text-center mb-100">
            <h2><span>Our</span> Achievement</h2>
            <p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, <br> quis nostrud exercitation ullamco laboris nisi ut aliquip </p>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-count mb-30 count-one count-white">
                    <div class="count-img">
                        <img src="{{ asset('assets/img/icon-img/funfact-1.png') }}" alt="">
                    </div>
                    <div class="count-content">
                        <h2 class="count">160</h2>
                        <span>AWARD WINNING</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-count mb-30 count-two count-white">
                    <div class="count-img">
                        <img src="{{ asset('assets/img/icon-img/funfact-2.png') }}" alt="">
                    </div>
                    <div class="count-content">
                        <h2 class="count">200</h2>
                        <span>GRADUATE</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
                <div class="single-count mb-30 count-three count-white">
                    <div class="count-img">
                        <img src="{{ asset('assets/img/icon-img/funfact-1.png') }}" alt="">
                    </div>
                    <div class="count-content">
                        <h2 class="count">160</h2>
                        <span>AWARD WINNING</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6">
                <div class="single-count mb-30 count-four count-white">
                    <div class="count-img">
                        <img src="{{ asset('assets/img/icon-img/funfact-2.png') }}" alt="">
                    </div>
                    <div class="count-content">
                        <h2 class="count">200</h2>
                        <span>FACULTIES</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  {{-- * TEACHERS PROFILE  --}}

  <div class="course-area bg-img pt-130">
    <div class="container">
        <div class="section-title mb-75 course-mrg-small">
            <h2>Our Honorable <span>Teachers </span></h2>
            <p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim <br>veniam, quis nostrud
                exercitation ullamco laboris nisi ut aliquip </p>
        </div>
        <div class="course-slider-active-3 mb-5">
            @forelse ($teacher_info as $teacher)
                <div class="single-course">
                    <div class="course-img" style="height: 200px;">
                        <a href="course-details.html"><img class=
                        "animated" src="{{ $teacher->teacher_image }}"
                                alt=""></a>
                        <span>{{ $teacher->teacher_designetion }}</span>
                    </div>
                    <div class="course-content">
                        <h4>{{ $teacher->teacher_name }}</h4>
                        <p>
                            @if (strlen($teacher->accademic_profile) > 100 )
                                {!! substr($teacher->accademic_profile, 0, 60) !!} .....
                            @else
                                {!! $teacher->accademic_profile !!}
                            @endif
                        </p>
                    </div>
                    <div class="course-position-content">
                        <div class="credit-duration-wrap" style="display: block; !importent">
                            <div class="sin-credit-duration mb-2">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span> <a href="tel:{{ $teacher->teacher_phone }}">{{ $teacher->teacher_phone }}</a> </span>
                            </div>
                            <div class="sin-credit-duration">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span>{{ $teacher->teacher_email }}</span>
                            </div>
                        </div>
                        <div class="course-btn">
                            <a class="default-btn teacher-btn" target="_blank" href="{{ route('index.details', $teacher->id) }}">About Me</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="row">
                    <div class="col">
                        <h1>no teachers data found</h1>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection