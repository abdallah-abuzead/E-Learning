<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/login-style.css')}}">
    <script src="{{asset('js/jQuery 4.3.1.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>

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