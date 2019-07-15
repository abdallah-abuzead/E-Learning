@extends('include')
@section('navbar')
<div class="upper-bar">
    <div class="container">

    @if(!empty(Session::get('frontSession')))
            <img class="my-image img-circle " style="border: 1px solid #aaa;" src="{{ asset("profilePic/".Session::get('frontSession')->profilePic) }}" alt="">
            <div class="btn-group my-info">
                        <span class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            {{--user logged in--}}
                            {{Session::get('frontSession')->username}}
                            
                            <span class="caret"></span>
                        </span>
            <ul class="dropdown-menu">
                <li><a href="{{url('/student-profile/'.Session::get('frontSession')->id)}}">My Profile</a></li>
                <!-- <li><a href="profile.php#my-courses">My Courses</a></li> -->
                <!-- <li><a href="#">Edit Profile</a></li> -->
                @if(Session::get('type')=='lecturer')
                <li><a href="{{url('Courses/create')}}">New Course</a></li>
                <li><a href="#">New Exam</a></li>
                @endif
                <li><a href="{{ url('/user-logout') }}">Log out</a></li>
            </ul>
        </div>

            @else
        <a href="{{ url('/user-login') }}">
            <span class="pull-right">Login | Signup</span>
        </a>
        @endif
    </div>
</div>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="/home">E-Courses</a></div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav " style="font-size: 18px;">
                <li><a href="{{url('/home')}}">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="{{url('/homeStudent')}}">Courses</a></li>
            </ul>
            <form class="navbar-form navbar-right" action="{{route('search')}}">
                <div class="form-group">
                    <input type="text" name="word" class="form-control" placeholder="Search" style="width: 250px">
                    <button type='submit' class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</nav>
<br><br><br>

@yield('content')
@endsection