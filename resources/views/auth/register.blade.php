<!-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/register-style.css')}}">
    <script src="{{asset('js/jQuery 4.3.1.js')}}"></script>

    <title>Online Courses</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/question.png')}}"/>
</head> 
<body>
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="../images/Itachi Cute.png" alt="list"/>
            <h1>Lecturer</h1> 
            <p>Has the privilige to add courses with proper price for the students to buy</p>
        </div>
        <div class="col-md-9 register-right">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a id="lecturer-toggle" class="nav-link active" id="lecturer-tab" data-toggle="tab" 
                    href="#lecturer" role="tab" aria-controls="lecturer" aria-selected="true">Lecturer</a>
                </li>
                <li class="nav-item">
                    <a id="student-toggle" class="nav-link" id="student-tab" data-toggle="tab" 
                    href="#student" role="tab" aria-controls="student" aria-selected="false">
                        Student
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="lecturer" role="tabpanel"
                    aria-labelledby="lecturer-tab">
                    <form action="{{ route('register') }}" method="post" id="lecRegister">
                        <h3 class="register-heading">Register as Lecturer</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name *"
                                    name="name" required/>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username *"
                                    name="username" required/>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" 
                                    placeholder="Password *" name="password" minlength="8" required/>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email *" 
                                    name="email" required/>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="title" form="lecRegister" 
                                    placeholder="Enter your title..."></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="tabel" value="lecturer"> 
                            <div class="col-md-6 registerContainer">
                                <input type="submit" class="registerBtn" value="Register"/>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade show" id="student" role="tabpanel"
                     aria-labelledby="student-tab">
                    <form action="" method="post">
                    <h3 class="register-heading">Register as Student</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name *"
                                    name="name" required/>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username *"
                                    name="username" required/>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" 
                                    placeholder="Password *" name="password" minlength="8" required/>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email *" 
                                    name="email" required/>
                                </div>
                            </div>
                            <input type="hidden" name="tabel" value="student"> 
                            <div class="col-md-6 registerContainer">
                                <input type="submit" class="registerBtn" value="Register"/>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="back container">
                    <a href="{{ url('/login') }}">
                        <input type="button" name="back" value="Back "/>
                        <img src="{{asset('images/rightArrow.png')}}" alt="back-arrow"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#lecturer-toggle").click(function (e) {
            if (!$(this).hasClass("active")) { 
                $(this).addClass("active");
                $("#lecturer").addClass("active");

                $("#student-toggle").removeClass("active");
                $("#student").removeClass("active"); 

                $(".register-left img").attr("src", "../images/Itachi Cute.png"); 
                $(".register-left h1").text("Lecturer"); 
                $(".register-left p").text("Has the privilege to add courses with proper price for "
                    + "the students to enroll in"); 
            }
        });

        $("#student-toggle").click(function (e) {
            if (!$(this).hasClass("active")) {
                $(this).addClass("active");
                $("#student").addClass("active");

                $("#lecturer-toggle").removeClass("active");
                $("#lecturer").removeClass("active");

                $(".register-left img").attr("src", "../images/itachi susano cute.png"); 
                $(".register-left h1").text("Student"); 
                $(".register-left p").text("Has the privilege to enroll in any course after buying it"); 
            }
        });
    });
</script>
</body>
</html>