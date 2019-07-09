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
                    <source src="{{asset("courses/".$course->subject."_".$course->id."/".$videos[0]->video)}}"
                            type="video/{{$videos[0]->extension}}">
                </video>
                <div class="caption">
                    <h4>{{$videos[0]->name}}</h4>
                </div>
            </div>
        </div>

        @if(isset($videos[1]))
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail " style="height: 235px; max-height: 235px; overflow: hidden;">
                    <video width="245" height="140">
                        <source src="{{asset("courses/".$course->subject."_".$course->id."/".$videos[1]->video)}}"
                                type="video/{{$videos[1]->extension}}">
                    </video>
                    <div class="caption">
                        <hr class="custom-hr">
                        <a href="/playVideo/{{$videos[1]->id}}" style="color: #000; margin-top: -10px; display: block">{{$videos[1]->name}}</a>
                    </div>
                </div>
            </div>
        @endif

        @if(isset($videos[2]))
            <div class="col-sm-6 col-md-3" style=" margin-top: 17px;">
                <div class="thumbnail " style="height: 235px; max-height: 235px; overflow: hidden;">
                    <video width="245" height="140">
                        <source src="{{asset("courses/".$course->subject."_".$course->id."/".$videos[2]->video)}}"
                                type="video/{{$videos[2]->extension}}">
                    </video>
                    <div class="caption">
                        <hr class="custom-hr">
                        <a href="/playVideo/{{$videos[2]->id}}" style="color: #000; margin-top: -10px; display: block">{{$videos[2]->name}}</a>
                    </div>
                </div>
            </div>
        @endif

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
        @if(Session::get('type')=='lecturer' && Session::get('frontSession')->id==$course->lec_id)
            <span class="pull-right confirm"><a href="/deleteVideo/{{$videos[0]->id}}"> Delete This Video </a></span>
        @endif
        <br><br>
    </div>
@endsection