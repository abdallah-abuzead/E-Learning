@extends('navbar')
@section('content')

    {{--Course Information=====================================================================================--}}

    <h1 style="margin-top: -20px; margin-bottom: 50px; text-decoration: underline" class="text-center">{{$course->subject." Course"}}</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="img-responsive img-thumbnail center-block" src='{{asset("images/course.jpg")}}'>
            </div>
            <div class="col-md-8 course-info">
                <h2>{{$course->subject}}</h2>
                <p>inline description</p>
                <ul class="list-unstyled">
                    <li>
                        <i class="fa fa-user fa-fw"></i>
                        <span>Added by</span>: <a href="#">{{$course->lecturer->username}}</a>
                    </li>
                    <li>
                        <i class="fa fa-calendar-alt fa-fw"></i>
                        <span>Added Date</span>:
                        {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $course->created_at)->format("F j, Y, g:i a")}}
                    </li>
                    <li>
                        <i class="fa fa-money-bill-alt fa-fw"></i>
                        <span>Cost</span>:
                    </li>
                    <li>
                        <i class="fa fa-building fa-fw"></i>
                        <span>NO. of hours</span>:
                    </li>
                </ul>
            </div>
        </div>
        <br>

        {{--Course Control==========================================================================--}}

        @if(Session::get('frontSession')->id==$course->lec_id)
            <button class="btn btn-primary btn-lg add-video-button">
                <i class="fa fa-plus"></i>  Add New Video
            </button>

            {{--sitting --}}
            <div class="btn-group my-info pull-right">
                        <span class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-cog"></i>
                            <span class="caret"></span>
                        </span>
                <ul class="dropdown-menu sitting">
                    <li>
                        <a href="/editCourse/{{$course->id}}">
                            <i class="fa fa-edit"> </i>  Edit Course
                        </a>
                    </li>
                    <li><a href="/createExam/{{$course->id}}">
                            <i class="fa fa-plus"> </i>  Add Exam
                        </a>
                    </li>
                    <li><a href="/deleteExam/{{$course->id}}" class="delete-exam">
                            <i class="fa fa-window-close"> </i>  Delete Exam
                        </a>
                    </li>
                </ul>
            </div>
        @endif

        {{--Add Video Form==================================================================================--}}

        <div class="add-video" style="z-index: 1;">

            <form class="container" action="/storeVideo" method="post" enctype="multipart/form-data" style="width:450px;">
                <input type="hidden" name="id" value="{{$course->id}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <div class="form-group text-center">
                    <label for="video"><h2>Select Video</h2></label><br><br>
                    <div >
                        <input type="file" name="video" id="video" class="form-control" accept="video/*" required>
                    </div>
                </div>

                {{--<div class="form-group">--}}
                    {{--<label for="duration">Video Duration</label>--}}
                    {{--<div >--}}
                        {{--<input type="number" name="duration" id="duration" class="form-control" placeholder="Duration In Minuts">--}}
                    {{--</div>--}}
                {{--</div>--}}

                <input type="submit" value="Upload Video" class="btn btn-primary form-control">
                <button class="btn btn-danger cancel form-control">Cancel</button>

            </form>
        </div>
        <hr class="custom-hr">
        <br>

        {{--Add Description=============================================================================--}}

        <h2>Course Description</h2>
        <div class="description">
        @if(Session::get('type')=='lecturer' && Session::get('frontSession')->id==$course->lec_id)
                <button class="btn btn-default add-description-button" style="margin-left: 20px; background: #eee;">
                    <i class="fa fa-plus fa-2x"></i>
                </button>
                <div class="add-description" style="z-index: 1;">
                    <form class="container" action="/storeDescription" method="post"  style="width:450px;">
                        <input type="hidden" name="course_id" value="{{$course->id}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="form-group text-center">
                            <label for="description"><h2>Add Description</h2></label><br><br>
                            <div >
                                <textarea name="description" id="description" cols="45" rows="5"
                                          style="max-width: 420px;"></textarea>
                            </div>
                        </div>

                        <input type="submit" value="Add Description" class="btn btn-primary form-control">
                        <button class="btn btn-danger cancel form-control">Cancel</button>

                    </form>
                </div>

                <hr class="custom-hr">
            @endif

            {{--View & Control Descriptions====================================================================--}}

            @foreach($course->descriptions as $description)
                <div class="desc">
                    @if(Session::get('type')=='lecturer' && Session::get('frontSession')->id==$course->lec_id)
                        <div class="hidden-control">
                            <a href="/editDescription/{{$description->id}}">
                                <i class="fa fa-edit edit-description" style="cursor: pointer; color: blue;"></i>
                            </a>
                            <span style="margin-left: 20px;"></span>
                            <a href="/deleteDescription/{{$description->id}}">
                                <i class="far fa-trash-alt" style="color: red;"></i>
                            </a>
                        </div>
                    @endif
                    <i class="fas fa-check-circle"
                       style="font-size: 12px;position: absolute; top: 15px;"></i>
                    <li>{{$description->description}}</li>
                </div>
            @endforeach
        </div>

        {{--Check Enrollment==================================================================================--}}
        
        @if( $enrolled || Session::get('frontSession')->id==$course->lec_id)
            <a class="btn btn-success btn-lg enroll" href="">Watch Videos</a>
        @else
            <a class="btn btn-success btn-lg enroll" href="/enrollCourse/{{$course->id}}">
                Enroll Now
                <span>${{$course->price}}</span>
            </a>
        @endif
        <br>

        {{--Show Videos Section================================================================================--}}

        <div class="row">
            <hr class="custom-hr">
            <br>
            @foreach ($videos as $video)
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail video" style="max-height: 205px;">
                        <video width="252" height="140">
                            <source src='{{asset("courses/".$course->subject."_".$course->id."/".$video->video)}}'
                                    type="video/{{$video->extension}}">
                        </video>
                        <div class="caption">
                            <h5><a href="/playVideo/{{$video->id}}" style="color: #FFF;">{{$video->name}}</a></h5>
                        </div>
                    </div>
                    {{--{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $video->created_at)->format("F j, Y, g:i a")}}--}}
                </div>
            @endforeach
        </div>
        <br><br>

        {{--Start Exam===========================================================================================--}}

        <a href="/startExam/{{$course->id}}" class="start-exam">Start {{$course->subject}} Exam!</a>
        <br><br><br>

        {{--View Course Comments==================================================================================--}}

        <h2>Comments</h2>
        <hr class="custom-hr" style="margin-top: -1px;">
        <div class='row'>
            <div class="comment-box">
                <div class='col-md-2 text-center'>
                    <img class="img-responsive img-thumbnail center-block img-circle" src="{{asset('images/commenter.png')}}">
                    aaaaaaaaaaaa
                </div>
                <div class='col-md-10 lead'>aaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaa aaaaaaa aasasasa asa  sa s as  as</div>
            </div>
        </div>
        <hr class="custom-hr">

        {{--Add Comment===========================================================================================--}}

        <div class="row">
            <div class="col-md-offset-3">
                <div class="add-comment">
                    <h3>Add Your Comment</h3>
                    <form action="/storeComment" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="user_id" value="{{Session::get('frontSession')->id}}">
                        <input type="hidden" name="course_id" value="{{$course->id}}">
                        <textarea name="comment" required></textarea>
                        <input type="submit" class="btn btn-primary" value="Add Comment">
                    </form>
                </div>
            </div>
        </div>
        <br><br>

        {{--Delete Course=======================================================================================--}}

        @if(Session::get('type')=='lecturer' && Session::get('frontSession')->id==$course->lec_id)
            <span class="pull-right confirm"><a href="/deleteCourse/{{$course->id}}"> Delete This Course </a></span>
        @endif
        <br><br>
    </div>
@endsection