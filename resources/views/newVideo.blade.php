@extends('include')

@section('content')
    <div class="container">
        <h1 class='text-center'>Add New Video</h1>
        <br><br><br><br>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="container alert alert-danger">
                    {{$error}}
                </div>
            @endforeach
        @endif
        <form class="container" action="/storeVideo" method="post" enctype="multipart/form-data" style="width:450px;">
            <input type="hidden" name="id" value="{{$course->id}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="video">Select Video</label>
                <input type="file" name="video" id="video" class="form-control" accept="video/*">
            </div>

            <input type="submit" value="Add Member" class="btn btn-primary">
            <input type="reset" value="Cancel" class="btn btn-danger">
        </form>
    </div>
@endsection