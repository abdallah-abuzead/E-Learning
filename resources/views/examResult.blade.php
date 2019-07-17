@extends('navbar')

<link rel="stylesheet" href="{{ asset('css/examResult-style.css') }}">
<!-- <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet"> -->

@section('content')
    <div class="container result-exam">
        <div class="panel-primary">
            <div class="panel-heading"> {{ $exam->title }} Exam Result</div>
            <div class="panel-body start-exam-div">
                <span>Congratulations</span>
                <div class="certificate-container">
                    @include('certificate');
                </div>
                <div class="btn-group-toggle">
                    <a href="{{ url('/home') }}">
                        <img src="{{asset('images/leftArrow.png')}}" alt="back-arrow"/>
                        <p class="btn btn-default">
                            Back to home
                        </p>
                    </a>
                    <a class="btn btn-primary" href="{{ url('/download-certificate/'.$exam->id) }}">
                        Download Certification PDF
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
