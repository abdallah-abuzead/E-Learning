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
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/register-style.css')}}">
    <script src="{{asset('js/jQuery 4.3.1.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <title>Online Courses</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/question.png')}}"/>
</head> 
<body>
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="../images/list.png" alt="list"/>
            <h3>Welcome</h3>
            <p>If you don't have an account, you can register <strong>Now!</strong></p>
            <a href="{{ url('/register') }}">
                <input type="button" name="" value="Register"/><br/>
            </a>
        </div>
        <div class="col-md-9 register-right">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a id="home-toggle" class="nav-link active" id="home-tab" data-toggle="tab" 
                    href="#home" role="tab" aria-controls="home" aria-selected="true">Lecturer</a>
                </li>
                <li class="nav-item">
                    <a id="profile-toggle" class="nav-link" id="profile-tab" data-toggle="tab" 
                    href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                        Student
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel"
                    aria-labelledby="home-tab">
                    <form action="{{ route('register') }}" method="post" id="lecRegister">
                    @csrf
                        <h3 class="register-heading">Register as Lecturer</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name *"
                                    name="name"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username *"
                                    name="username"/>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" 
                                    placeholder="Password *" name="password"/>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email *" 
                                    name="email"/>
                                </div>
                                <div class="form-group">
                                    <textarea name="title" form="lecRegister" cols="90"
                                    placeholder="Enter your title..."></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="tabel" value="lecturer"> 
                            <div class="col-md-6">
                                <input type="submit" class="btnRegister" value="Login"/>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade show" id="profile" role="tabpanel"
                     aria-labelledby="profile-tab">
                    <form action="" method="post">
                        <h3 class="register-heading">Register as Student</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username *"
                                    name="username"/>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" 
                                    placeholder="Password *" name="password"/>
                                </div>
                            </div>
                            <input type="hidden" name="tabel" value="student"> 
                            <div class="col-md-6">
                                <input type="submit" class="btnRegister" value="Login"/>
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
        $("#home-toggle").click(function (e) {
            if (!$(this).hasClass("active")) {
                $(this).addClass("active");
                $("#home").addClass("active");

                $("#profile-toggle").removeClass("active");
                $("#profile").removeClass("active");
            }
        });

        $("#profile-toggle").click(function (e) {
            if (!$(this).hasClass("active")) {
                $(this).addClass("active");
                $("#profile").addClass("active");

                $("#home-toggle").removeClass("active");
                $("#home").removeClass("active");
            }
        });
    });
</script>
</body>
</html>