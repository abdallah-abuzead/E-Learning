@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($courses as $course)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail item-box">
                    <img class="img-responsive" src={{asset("course.jpg")}}>
                    <div class="caption">
                        <h3><a href="/courses/{{$course->id}}"> {{$course->subject}}</a></h3>
                        <p>Added by: <a href="/lecturer/{{$course->lec_id}}"> {{$course->lec_id}} </a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

