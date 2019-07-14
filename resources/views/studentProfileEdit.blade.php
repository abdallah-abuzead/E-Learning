@extends('navbar')

<link rel="stylesheet" href="{{ asset('css/student-profileStyle.css') }}">

@section('content')
    <div class="student-profileImg">
        <img src="{{ asset('images/reading.png') }}" alt="student-profile">
    </div>

    <h1 class="text-center profile-title">My Profile</h1>
    <div class="information block">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">My Information</div>
                @if(Session::has('flash_message_error'))
                <p class="alert alert-info">{{ Session::get('flash_message_error') }}</p>
                @endif
                <div class="panel-body">
                    <form action='{{ url("/student-profile-save/$id") }}' method="post" id='form'>
                        {{ csrf_field() }}
                    <ul class="list-unstyled">
                        <li>
                            <i class="fa fa-unlock-alt fa-fw"></i>
                            <label for="username">Login Name</label>
                            <input type="text" class="form-text form-control" name="username" id="username" value="{{ Session::get('frontSession')->username }}" required>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <label for="email">Email</label>
                            <input type="email" class="form-text form-control" name="email" id="email" value="{{ Session::get('frontSession')->email }}" required>
                        </li>
                        <li>
                            <i class="fa fa-user fa-fw"></i>
                            <label for="fullname">Full Name</label>
                            <input type="text" class="form-text form-control" name="fullname" id="fullname" value="{{ Session::get('frontSession')->fullName }}" required>
                        </li>
                        <li>
                            <i class="fa fa-calendar-alt fa-fw"></i>
                            <label for="password">Password</label>

                            <div class="show-pass">
                                <input type="password" class="form-text form-control" name="password" id="password" value="" minlength="8" required>
                                <!-- <span class="fa fa-eye" id='span'></span> -->
                            </div>

                            <div class="hidden-confirm">
                                <input type="password" class="form-text form-control" name="-confirm-password" id="confirm-password" placeholder="Confirm Password">
                            </div>

                            <div class="hidden-confirm">
                                <input type="password" class="form-text form-control" name="oldPassword" id="oldPassword" placeholder="Old Password">
                            </div>
                        </li>
                    </ul>
                    <div style="margin-left: 10px;">
                        <input type="submit" class="btn btn-success" value="Save Changes">

                        <a class="btn btn-danger" href="{{ url('/student-profile/'.$id) }}">
                            Discard changes
                        </a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br><br>

    <script src="{{ asset('js/jQuery 4.3.1.js') }}"></script>
    <script>
        $(document).ready(function () {
            $edited = false;
            $hidden = true;
            $(".hidden-confirm").hide();


            $(".show-pass #span").on('click',function () {
                alert('d5al');
                $(this).toggleClass("fa-eye");
                $(this).toggleClass("fa-eye-slash");

                if($("#password").attr("type") == "password") {
                    $("#password").attr("type", "text");
                } else {
                    $("#password").attr("type", "password");
                }
            });

            $("#username").on("input", function (e) {
                if(!$edited) {
                    $edited = true;
                }
            });

            $("#email").on("input", function (e) {
                if(!$edited) {
                    $edited = true;
                }
            });

            $("#fullname").on("input", function (e) {
                if(!$edited) {
                    $edited = true;
                }
            });

            $("#password").on("input", function (e) {
                if(!$edited) {
                    $edited = true;
                }

                //console.log($(".hidden-confirm").hidden);

                if($hidden) {
                    $(".hidden-confirm").show(300);
                    $hidden = false;
                }
            });

            $("#form").on("submit",function (e) {
                if(!$hidden) {
                    if($("#password").val() != $("#confirm-password").val()) {
                        e.preventDefault();

                        $("#password").css({"border-color": "red"});

                        $("#confirm-password").css({"border-color": "red"});
                        $("#confirm-password").val("");
                        $("#confirm-password").attr("placeholder", "No Match");
                    }
                }
            });
        });
    </script>
@endsection
