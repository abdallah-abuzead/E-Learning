@extends('include')
@extends('navbar')

<link rel="stylesheet" href="{{asset('css/student-profileStyle.css')}}">

@section('content')
    <div class="student-profileImg">
        <img src="{{ asset('images/reading.png') }}" alt="student-profile">
    </div>

    <h1 class="text-center profile-title">My Profile</h1>
    <div class="information block">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">My Information</div>
                <div class="panel-body">
                    <form action="{{ url("student-profile-edit/$student->id") }}" method="post">
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
                            <li>
                                <i class="fa fa-calendar-alt fa-fw"></i>
                                <span>Password</span>:
                                <input type="hidden" name="password" value="{{ $student->password }}">
                                @for($i = 0; $i < strlen($student->password); $i++)
                                    *
                                @endfor
                            </li>
                        </ul>
                        <input class="btn btn-default" type="submit" value="Edit Information">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="my-items" class="my--ads block">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">My Courses</div>
                <div class="panel-body">
                    <div class='row'>
                    @if($student->courses->count() === 0)
                        <div class="container">
                            <span>No courses enrolled in</span>
                        </div>
                    @else
                        @foreach($student->courses as $course)
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

