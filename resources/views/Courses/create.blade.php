@extends('navbar')


@section('content')


    <style>

        .contant{

            height: auto;
            width: 60%;
            background-color:white;
            margin-left: 230px;
            margin-top: 10px;
            border-radius: 20px;
            padding:26px;

        }
        .button {
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            margin: 4px 2px;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius: 10px;

        }

        .button1 {
            color: black;
            background-color: #5cd08d;
        }

        .button1:hover {
            background-color: #007bff;
            color: white;
        }
        .button1:hover {
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
        }

        .button2 {
            color: black;
            background-color: #ff0000;
        }

        .button2:hover {
            background-color: #5e5e5e;
            color: white;
        }
        .button2:hover {
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
        }

    </style>
    <center> <h1>Add New Course</h1></center>

    <div class="contant">

        <form action="/Courses/create" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <div class="from-group" style="margin-top: 10px">
                <label for="Subject"> Subject </label>
                <input type="text" name="Subject" required id="Subject" class="form-control"/>
            </div>

            @foreach ($errors->get('Subject') as $error)
                <label style="color: red">
                    {{$error}}
                </label>
            @endforeach

            <div class="from-group">
                <label for="description"> description </label>
                <input type="text" name="description" required id="description"  class="form-control"/>
            </div>
            @foreach ($errors->get('description') as $error)

                <label style="color: red">
                    {{$error}}
                </label>
            @endforeach
            <div class="from-group">
    <label for="level"> level </label>

    <select name="level" id="level" required class="form-control">

        <option value="Beginner">
            Beginner
        </option>
        <option value="Elementary">
            Elementary
        </option>
        <option value="intermediate">
            intermediate
        </option>

        <option value="advanced">
            advanced
        </option>

    </select>

</div>
@foreach ($errors->get('level') as $error)

    <label style="color: red">
        {{$error}}
    </label>
@endforeach
            <div class="from-group">
                <label for="cost"> cost </label>
                <input type="text" name="cost" id="cost" required class="form-control"/>
            </div>
            @foreach ($errors->get('cost') as $error)

                <label style="color: red">
                    {{$error}}
                </label>
            @endforeach

            <div class="from-group">
                <label for="NumberOfHours"> NumberOfHours </label>
                <input type="number" name="NumberOfHours" required id="NumberOfHours" class="form-control"/>
            </div>
            @foreach ($errors->get('NumberOfHours') as $error)

                <label style="color: red">
                    {{$error}}
                </label>
            @endforeach


            <input type="submit" value="INSERT" class="button button1" style="margin-left:200px;">
            <input type="reset" value="Cancel" class="button button2">

        </form>

    </div>
@endsection
