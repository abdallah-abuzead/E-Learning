@extends('navbar')

<link rel="stylesheet" href="{{asset('css/student-profileStyle.css')}}">

@section('content')
    <div class="student-profileImg">
        <img class="img-responsive img-thumbnail" width="200px" height="150px;" src="{{ asset("profilePic/$student->profilePic") }}" alt="student-profile">
    </div>

    <h1 class="text-center profile-title">My Profile</h1>
    <div class="information block">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">My Information</div>
                <div class="panel-body">
                    <form action='{{ url("student-profile-edit/$student->id") }}' method="get">
                        @csrf
                        <ul class="list-unstyled">
                            <li>
                                <i class="fa fa-unlock-alt fa-fw"></i>
                                <span>Login Name</span>: {{ $student->username }}
                                <input type="hidden" name="username" value="{{ $student->username }}">
                            </li>
                            <li>
                                <i class="fa fa-envelope fa-fw"></i>
                                <span>Email</span>: {{ $student->email }}
                                <input type="hidden" name="email" value="{{ $student->email }}">
                            </li>
                            <li>
                                <i class="fa fa-user fa-fw"></i>
                                <span>Full Name</span>: {{ $student->fullName }}
                                <input type="hidden" name="fullname" value="{{ $student->fullName }}">
                            </li>
                            @if(Session::get('type')=='lecturer')
                            <li>
                                <i class="fa fa-user fa-fw"></i>
                                <span>Instructor Title</span>: {{ $student->title }}
                                <input type="hidden" name="title" value="{{ $student->title }}">
                            </li>
                            @endif
                            <!-- <li>
                                <i class="fa fa-calendar-alt fa-fw"></i>
                                <span>Password</span>:
                                <input type="hidden" name="password" value="{{ $student->password }}">
                                @for($i = 0; $i < strlen($student->password); $i++)
                                    *
                                @endfor
                            </li> -->

                        </ul>
                        @if(Session::get('frontSession')->id == $student->id)<input class="btn btn-default" type="submit" value="Edit Information">@endif
                    </form>
                </div>
            </div>
        </div>
    </div>


    @if($student->type==1)
    <div id="my-items" class="my--ads block">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">Courses Crated</div>
                <div class="panel-body">
                    <div class='row'>
                    @if($student->coursesCreated->count() === 0)
                        <div class="container">
                            <span>No courses created</span>
                        </div>
                    @else
                        @foreach($student->coursesCreated as $course)
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail item-box">
                                    <img class="img-responsive" src="{{asset('images/course.jpg')}}">
                                    <h3><a href="/courses/{{$course->id}}"> {{$course->subject}}</a></h3>
                                </div>
                            </div>
                        @endforeach 
                    @endif 
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div id="my-items" class="my--ads block">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">Enrolled Courses</div>
                <div class="panel-body">
                    <div class='row'>
                    @if($student->coursesEnrolled->count() === 0)
                        <div class="container">
                            <span>No courses enrolled in</span>
                        </div>
                    @else
                        @foreach($student->coursesEnrolled as $course)
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail item-box">
                                    <span class="grade-tag">
                                        @if($course->pivot->commulativeGrade == null)
                                            In progress
                                        @else
                                            {{ $course->pivot->commulativeGrade }}
                                        @endif
                                    </span>
                                    <img class="img-responsive img-thumbnail" src="{{asset('images/course.jpg')}}">
                                    <h3 class="course-subject"> {{ $course->subject }}</h3>
                                    <div class="caption">
                                        <details class="lecturer-detail">
                                            <summary>Added by: <a href="#"> {{ $course->lecturer->fullName }} </a></summary>
                                            <p> {{ $course->lecturer->title }} </p>
                                        </details>
                                    </div>
                                </div>
                            </div>
                        @endforeach 
                    @endif 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

