@extends('include')

<div class="upper-bar">
    <div class="container">

    @if(!empty(Session::get('frontSession')))
        <img class="my-image img-circle img-thumbnail" src="{{asset('images/commenter.png')}}">
        <div class="btn-group my-info">
                        <span class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            {{--user logged in--}}
                            Abdallah
                            <span class="caret"></span>
                        </span>
            <ul class="dropdown-menu">
                <li><a href="#">My Profile</a></li>
                <li><a href="Courses/create">New Course</a></li>
                <li><a href="profile.php#my-courses">My Courses</a></li>
                <li><a href="#">Edit Profile</a></li>
                @if(Session::get('type')=='lecturer')
                <li><a href="Courses/create">Add Course</a></li>
                <li><a href="product/create">Add Exam</a></li>
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
                <li><a href="/home">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="/homeStudent">Courses</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" style="width: 250px">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</nav>
<br><br><br>

@yield('content')
