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
    <h1 class="text-center" style="margin-top: -30px;">Update Course</h1>

    <div class="content">

        <form action="/Courses/update/{{$course->id}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <div class="from-group" style="margin-top: 10px">
                <label for="Subject"> Subject </label>
                <input type="text" name="Subject" required id="Subject" class="form-control" value="{{$course->subject}}"/>
            </div>
            @foreach ($errors->get('Subject') as $error)
                <label style="color: red">
                    {{$error}}
                </label>
            @endforeach
            <br>
            <div class="from-group">
                <label for="level"> Level </label>

                <select name="level" id="level" required class="form-control">

                    <option value="..." readonly>...</option>
                    <option value="Beginner" <?php if($course->level == "Beginner") echo "selected";?>>
                        Beginner
                    </option>
                    <option value="Intermediate" <?php if($course->level == "Intermediate") echo "selected";?>>
                        Intermediate
                    </option>
                    <option value="Advanced" <?php if($course->level == "Advanced") echo "selected";?>>
                        Advanced
                    </option>
                    <option value="Master" <?php if($course->level == "Master") echo "selected";?>>
                        Master
                    </option>
                    <option value="PhD" <?php if($course->level == "PhD") echo "selected";?>>
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
                <input type="text" name="cost" id="cost" required class="form-control" placeholder="In Dollars" value="{{$course->cost}}"/>
            </div>
            @foreach ($errors->get('cost') as $error)

                <label style="color: red">
                    {{$error}}
                </label>
            @endforeach
            <br>

            <div class="from-group">
                <label for="NumberOfHours"> Number Of Hours </label>
                <input type="number" name="NumberOfHours" required id="NumberOfHours" class="form-control" value="{{$course->numOfHours}}"/>
            </div>
            @foreach ($errors->get('NumberOfHours') as $error)

                <label style="color: red">
                    {{$error}}
                </label>
            @endforeach
            <br>

            <div class="from-group">
                <label for="coursePic"> Course Picture </label>
                <input type="file" name="coursePic" required id="coursePic" class="form-control" value="{{$course->coursePic}}" accept="image/*"/>
            </div>
            @foreach ($errors->get('coursePic') as $error)

                <label style="color: red">
                    {{$error}}
                </label>
            @endforeach
            <br>

            <input type="submit" value="Save Changes" class="btn btn-primary">
            <input type="reset" value="Cancel" class="btn btn-danger">

        </form>

    </div>
    <br><br><br>
@endsection
