@extends('navbar')

@section('content')
    <div class="container">
        <a href="/courses/{{$course->id}}">
            <h1 style="margin-top: -20px; margin-left: 15px; text-decoration: underline">{{$course->subject." Course"}}</h1>
        </a>
        <br>
        <div class="col-sm-6 col-md-9">
            <div class="thumbnail " >
                <video width="815" height="500" controls>
                    <source src="{{asset("courses/".$course->subject."_".$course->id."/".$video->video)}}"
                            type="video/{{$video->extension}}">
                </video>
                <div class="caption">
                    <h4>{{$video->name}}</h4>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="thumbnail " style="height: 240px; max-height: 240px; overflow: hidden;">
                <video width="245" height="140">
                    <source src="{{asset("courses/".$course->subject."_".$course->id."/".$video1->video)}}"
                            type="video/{{$video1->extension}}">
                </video>
                <div class="caption">
                    <hr class="custom-hr">
                    <a href="/playVideo/{{$video1->id}}" style="color: #000; margin-top: -10px; display: block">{{$video1->name}}</a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3" style=" margin-top: 10px;">
            <div class="thumbnail " style="height: 237px; max-height: 237px; overflow: hidden;">
                <video width="245" height="140">
                    <source src="{{asset("courses/".$course->subject."_".$course->id."/".$video2->video)}}"
                            type="video/{{$video2->extension}}">
                </video>
                <div class="caption">
                    <hr class="custom-hr">
                    <a href="/playVideo/{{$video2->id}}" style="color: #000; margin-top: -10px; display: block">{{$video2->name}}</a>
                </div>
            </div>
        </div>

        <div style="clear: both;"></div>
        <br>

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
        <br><br>
        <span class="pull-right confirm"><a href="#"> Delete This Video </a></span>
        <br><br>
    </div>
@endsection