@extends('navbar')

<link rel="stylesheet" href="{{ asset('css/add-exam-style.css') }}">

@section('content')
    <div class="container add-exam">
        <div class="add-exam-course">
            <div class="subject-header"> Subject </div>
            <div class="subject-body container">
                {{ Session::get('subject') }}
            </div>
            <img src="{{ asset('/images/add-exam.png') }}" alt="profile">
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">Add an Exam</div>
            <div class="panel-body add-exam-div">
                <form id="add-quest-form" action="{{ url('add-questions') }}" method="get">
                    <div class="add-exam-form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Title" name="title" required/>
                        </div>
                        <div class="form-group">
                            <!-- <input type="text" class="form-control" placeholder="Duration" name="duration"
                                   onfocus="(this.type='time')" onblur="(this.type='text')"  min="9:00" max="18:00" required/> -->
                                   <label for='h'>Duration</label>
                                   <input id='h' name='h' type='number' min='0' max='24' required>
                                    <label for='h'>h</label>
                                    <input id='m' name='m' type='number' min='0' max='59' required>
                                    <label for='m'>m</label>
                        </div>
                        <div class="submit-group">
                            <input type="submit" id="btn-add" class="btn btn-primary" value="Add New Exam">
                        </div>
                    </div>
                </form>
                <div>
                    <a href="{{ url('#') }}" style="text-decoration: none;">
                        <img src="{{asset('images/leftArrow.png')}}" alt="back-arrow"/>
                        <p class="btn btn-default">Back</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
