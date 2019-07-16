@extends('navbar')

@section('content')


    <style>

        .content{
            width: 40%;
            background-color:white;
            margin: 20px auto;
            border-radius: 20px;
            padding:10px 20px;
            box-shadow: 5px 5px 5px #ccc;

        }

    </style>
    <h1 class="text-center" style="margin-top: -30px;">Edit Course</h1>

    <div class="content">

        <form action="/Courses/update/{{$course->id}}" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="id" value="{{$course->id}}">
            <div class="from-group" style="margin-top: 10px">
        <label for="Subject"> Subject </label>
        <input type="text" name="Subject" required id="Subject"value="{{$course->subject}}" class="form-control"/>
    </div>
    @foreach ($errors->get('Subject') as $error)
        <label style="color: red">
            {{$error}}
        </label>
    @endforeach
    <br>

    <div class="from-group">
        <label for="level"> Level </label>
        {{--<select name="level" id="level" class="form-control">--}}
            {{--@foreach($course as $course )--}}
                {{--<option value="{{$course->id}}">--}}
                    {{--{{$course->level}}--}}
                {{--</option>--}}
            {{--@endforeach--}}
        {{--</select>--}}
    {{--</div>--}}

        <select name="level" id="level" required class="form-control">

            <option value="..." readonly>...</option>
            <option value="Beginner">
                Beginner
            </option>
            <option value="Intermediate">
                Intermediate
            </option>
            <option value="Advanced">
                Advanced
            </option>
            <option value="Master">
                Master
            </option>
            <option value="PhD">
                PhD
            </option>

        </select>

    </div>
    <br>
    @foreach ($errors->get('level') as $error)
        <label style="color: red">
            {{$error}}
        </label>
    @endforeach
    <div class="from-group">
        <label for="cost"> Cost </label>
        <input type="text" name="cost" id="cost" value="{{$course->cost}}" required class="form-control"/>
    </div>
    @foreach ($errors->get('cost') as $error)

        <label style="color: red">
            {{$error}}
        </label>
    @endforeach
    <br>

    <input type="submit" value="update Course" class="btn btn-primary">
    <input type="reset" value="Cancel" class="btn btn-danger">

</form>

    </div>
    <br><br><br>
@endsection
