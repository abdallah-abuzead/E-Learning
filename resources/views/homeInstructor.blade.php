<!doctype html>
<html>
<head>
    <meta charset="utf-8">

    <title>home instructor</title>


    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/ss.css')}}">
</head>


    <style>
        html, body {

            background-image: url("{{asset('images/head.jpg')}}");

            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            margin: 0;
            height: 100vh;
            background-position: center center;
            -webkit-background-size:cover;
            background-size: cover;
            position: relative;
        }

        /*.flex-center {*/
            /*align-items: center;*/
            /*display: flex;*/
            /*justify-content: center;*/
        /*}*/

        /*.position-ref {*/
            /*position: relative;*/
        /*}*/

        /*.top-right {*/
            /*position: absolute;*/
            /*right: 10px;*/
            /*top: 18px;*/
        /*}*/

        /*.links > a {*/

            /*padding: 0 25px;*/
            /*font-size: 12px;*/
            /*font-weight: 600;*/
            /*letter-spacing: .1rem;*/
            /*text-decoration: none;*/
            /*text-transform: uppercase;*/
        /*}*/


    </style>
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="wrapper">

        <ul class="nav-area">

            <li><a href="#">Home </a> </li>

            <li> <a href="Courses/create">  Add Courses </a></li>

            <li><a href="/product/create"> Add Exam</a></li>

            <li><a href="logoutAdmin.php">log out </a> </li>
        </ul>
    </div>


    {{--@if (Route::has('login'))--}}
        {{--<div class="top-right links">--}}
            {{--@auth--}}
                {{--<a href="{{ url('/home') }}">Home</a>--}}
                {{--@else--}}
                    {{--<a href="{{ route('login') }}">Login</a>--}}
                    {{--<a href="{{ route('register') }}">Register</a>--}}
                    {{--@endauth--}}
        {{--</div>--}}
    {{--@endif--}}
</div>

</body>
</html>


