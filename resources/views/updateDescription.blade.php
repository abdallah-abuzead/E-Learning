@extends('navbar')

@section('content')
    <form class="container" action="/updateDescription/{{$description->id}}" method="post"  style="width:600px;">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group text-center">
            <label for="description"><h2>Update Description</h2></label><br><br>
            <textarea name="description" id="description" cols="71" rows="4"
                      style="max-width: 570px;">{{$description->description}}</textarea>
        </div>
        <br>
        <input type="submit" value="Save Changes" class="btn btn-primary form-control"><br><br>
        <input type="reset" value="Cancel" class="btn btn-danger form-control">
    </form>
@endsection