@extends('layouts.app')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

@section('content')
    <h1 class="text-center">{{$course->subject}}</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="img-responsive img-thumbnail center-block" src={{asset("images/course.jpg")}}>
            </div>
            <div class="col-md-8 course-info">
                <h2>{{$course->subject}}</h2>
                <p>description</p>
                <ul class="list-unstyled">
                    <li>
                        <i class="fa fa-user fa-fw"></i>
                        <span>Added by</span>: {{$course->lec_id}}</a>
                    </li>
                    <li>
                        <i class="fa fa-calendar-alt fa-fw"></i>
                        <span>Added Date</span>:
                    </li>
                    <li>
                        <i class="fa fa-money-bill-alt fa-fw"></i>
                        <span>Price</span>:
                    </li>
                    <li>
                        <i class="fa fa-building fa-fw"></i>
                        <span>NO. of hours</span>:
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection