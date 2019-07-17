<html>
<head>
    <title> @yield('titleph')</title>
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">--}}

    {{--<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">--}}
    {{--<script src="{{asset('js/bootstrap.js')}}"></script>--}}
    <style>

        footer{
            /*background-color:#463C54;*/
            /*background-color: #cbd3da;*/
            color: #f7f7f7;
            background-color: #284257;

        }


        .fa {
            padding: 28px;
            font-size: 20px;
            width: 30px;
            text-align: center;
            text-decoration: none;
            margin: 5px 2px;
            border-radius: 50%;
        }

        .fa:hover {
            opacity: 0.7;
        }

        .fa-facebook {
            background: #3B5998;
            color: white;
        }
        .fa-twitter {
            background: #55ACEE;
            color: white;
        }

        .fa-google {
            background: #dd4b39;
            color: white;
        }

        .fa-linkedin {
            background: #007bb5;
            color: white;
        }
        #last{

            height: 50px;


        }


    </style>

</head>
<body>


<footer class="page-footer font-small stylish-color-dark pt-4">


    <div class="container text-center text-md-left">


        <div class="row">


            <div class="col-md-4 mx-auto">

                <hr>
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Footer Content</h5>
                <p>Here you can list any thig about online course website.</p>

            </div>

            <div class="col-md-2 mx-auto">

                <hr>

                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Legal</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="#!">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#!">other </a>
                    </li>
                    <li>
                        <a href="#!">other</a>
                    </li>
                    <li>
                        <a href="#!">other</a>
                    </li>
                </ul>

            </div>


            <hr>


            <div class="col-md-2 mx-auto">


                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">About</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="#!">Link 1</a>
                    </li>
                    <li>
                        <a href="#!">Link 2</a>
                    </li>
                    <li>
                        <a href="#!">Link 3</a>
                    </li>
                    <li>
                        <a href="#!">Link 4</a>
                    </li>
                </ul>

            </div>

            <div class="col-md-2 mx-auto">


                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Connect
                </h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="#!">Blog</a>
                    </li>
                    <li>
                        <a href="#!">Contact Us</a>
                    </li>
                    <li>
                        <a href="#!">Help Center</a>
                    </li>
                    <li>
                        <a href="#!">Other</a>
                    </li>
                </ul>

            </div>


        </div>


    </div>


    <hr>


    <ul class="list-unstyled list-inline text-center py-2">
        <li class="list-inline-item">
            <h5 class="mb-1">Register for free</h5>
        </li>
        <li class="list-inline-item">
            <a href="/user-register" class="btn btn-danger btn-rounded">Sign up!</a>
        </li>
    </ul>


    <hr>


    <ul class="list-unstyled list-inline text-center">
        <li class="list-inline-item">
            <a class="btn-floating btn-fb mx-1">
                <i class="fa fa-facebook"> </i>
            </a>
        </li>
        <li class="list-inline-item">
            <a class="btn-floating btn-tw mx-1">
                <i class="fa fa-twitter"> </i>
            </a>
        </li>
        <li class="list-inline-item">
            <a class="btn-floating btn-gplus mx-1">
                <i class="fa fa-google"> </i>
            </a>
        </li>
        <li class="list-inline-item">
            <a class="btn-floating btn-li mx-1">
                <i class="fa fa-linkedin"> </i>
            </a>
        </li>

    </ul>

    <div id="last" style="background-color:#2F3133">
        <h4 style="text-align: center;padding: 10px">
        © 2019 Copyright:
        <a href="#">
            OnlineCourses.com</a>
        Developed By our team
        </h4>
    </div>


</footer>




</body>
</html>


