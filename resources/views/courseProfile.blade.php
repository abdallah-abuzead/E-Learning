@extends('include')

@section('content')
    <h1 class="text-center">{{$course->subject}}</h1>
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
                        <span>Added by</span>: {{$course->lecturer->username}}</a>
                    </li>
                    <li>
                        <i class="fa fa-calendar-alt fa-fw"></i>
                        <span>Added Date</span>:
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
        @if(Session::get('type')=='lecturer')<a class="btn btn-primary btn-lg" href="/newVideo/{{$course->id}}"><i class="fa fa-plus"> </i>  Add New Video</a>@endif

        <hr class="custom-hr">
        <br>
        <h2>Course Description</h2>
        <pre style="padding-top: 20px;background: #fff">
        fksekkkkkkkkkkkkkkkkkkkkkkkkkk
        fksekkkkkkkkkkkkkkkkkkkkkkkkkk
        fksekkkkkkkkkkkkkkkkkkkkkkkkkk
        fksekkkkkkkkkkkkkkkkkkkkkkkkkk
        fksekkkkkkkkkkkkkkkkkkkkkkkkkk
        fksekkkkkkkkkkkkkkkkkkkkkkkkkk
        fksekkkkkkkkkkkkkkkkkkkkkkkkkk
        fksekkkkkkkkkkkkkkkkkkkkkkkkkk
        </pre>
        
        @if( Session::get('type')=='student' && $course->students[0]->id == Session::get('frontSession')->id )<a class="btn btn-success btn-lg enroll" href="">Watch Videos</a> @else <a class="btn btn-success btn-lg enroll" href="/enrollCourse/{{$course->id}}">Enroll Now <span>$100</span></a> @endif
        <br>
        <hr class="custom-hr">
        <br>
        <div class="row">
            @foreach ($videos as $video)
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail video" style="max-height: 205px;">
                        <video width="252" height="140">
                            {{--<source src="{{asset($video->url .'.'. $video->extension)}}"--}}
                                    {{--type="video/{{$video->extension}}">--}}
                        </video>
                        <div class="caption">
                            <h5><a href="/playVideo/{{$video->id}}" style="color: #FFF;">{{$video->name}}</a></h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <h2>Comments</h2>
        <hr class="custom-hr">
        <div class='row'>
            <div class="comment-box">
                <div class='col-md-2 text-center'>
                    <img class="img-responsive img-thumbnail center-block img-circle" src="{{asset('images/commenter.png')}}">
                    aaaaaaaaaaaa
                </div>
                <div class='col-md-10 lead'>aaaaaaaaaaaaaaaaaaaaaaaaaaaa</div>
            </div>
        </div>
        <hr class="custom-hr">

        <div class="row">
            <div class="col-md-offset-3">
                <div class="add-comment">
                    <h3>Add Your Comment</h3>
                    <form action="#" method="post">
                        <textarea name="comment" required></textarea>
                        <input type="submit" class="btn btn-primary" value="Add Comment">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection