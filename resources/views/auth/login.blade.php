<!-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
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
    <link rel="stylesheet" href="{{asset('css/login-style.css')}}">
    <script src="{{asset('js/jQuery 4.3.1.js')}}"></script>

    <title>Online Courses</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/question.png')}}"/>
</head>
<body>
<div class="container login">
    <div class="row">
        <div class="col-md-3 login-left">
            <img class="logo" src="../images/list.png" alt="list"/>
            <h3>Welcome</h3>
            <p>If you don't have an account, you can register <strong>Now!</strong></p>
            <a href="{{ url('/register') }}">
                <img src="{{asset('images/leftArrow.png')}}" alt="register-arrow"/>
                <input type="button" name="register" value="Register"/><br/>
            </a>
        </div>
        <div class="col-md-9 login-right">
            <ul class="nav nav-tabs nav-justified" role="tablist">
                <li class="nav-item">
                    <a id="lecturer-toggle" class="nav-link active" data-toggle="tab" 
                    href="#lecturer" role="tab" aria-controls="lecturer" aria-selected="true">
                        Lecturer
                    </a>
                </li>
                <li class="nav-item">
                    <a id="student-toggle" class="nav-link" data-toggle="tab" 
                    href="#student" role="tab" aria-controls="student" aria-selected="false">
                        Student
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="lecturer" role="tabpanel"
                    aria-labelledby="lecturer-tab">
                    <form action="" method="post">
                        <h3 class="login-heading">Login as Lecturer</h3>
                        <div class="row login-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username *"
                                    name="username" required/>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" 
                                    placeholder="Password *" name="password" minlength="8" required/>
                                </div>
                            </div>
                            <input type="hidden" name="tabel" value="lecturer"> 
                            <div class="col-md-6 loginContainer">
                                <input class="loginBtn" type="submit" class="btnRegister" value="Login"/>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade show" id="student" role="tabpanel"
                     aria-labelledby="student-tab">
                    <form action="" method="post">
                        <h3 class="login-heading">Login as Student</h3>
                        <div class="row login-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username *"
                                    name="username" required/>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" 
                                    placeholder="Password *" name="password" minlength="8" required/>
                                </div>
                            </div>
                            <input type="hidden" name="tabel" value="student"> 
                            <div class="col-md-6 loginContainer">
                                <input class="loginBtn" type="submit" class="btnRegister" value="Login"/>
                            </div>
                        </div>
                    </form>
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
            }
        }); 

        $("#student-toggle").click(function (e) {
            if (!$(this).hasClass("active")) {
                $(this).addClass("active");
                $("#student").addClass("active");

                $("#lecturer-toggle").removeClass("active");
                $("#lecturer").removeClass("active");
            }
        }); 
    });
</script>
</body>
</html> 