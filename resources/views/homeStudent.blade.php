@extends('include')
@extends('navbar')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($courses as $course)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img class="img-responsive center-block" src='{{asset("images/course.jpg")}}'>
                    <div class="caption">
                        <h3><a href="/courses/{{$course->id}}"> {{$course->subject}}</a></h3>
                        <p>Added by: {{$course->lecturer->username}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

