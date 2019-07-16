@extends('footer')
@extends('navbar')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div id="home" >
<div class="overlay">
<div class="container">
<div class="row ">
<div class="col-lg-9 col-md-9 head-text">
<h1 id="divDisp" >Online course </h1>
<span>
<i class="fa fa-lightbulb-o " ></i>For help your Student
</span>
                        <span>
<i class="fa fa-lightbulb-o" ></i>Allow student to see all courses avaliable
</span>

                        <span >
<i class="fa fa-lightbulb-o" ></i> Allow student to register in courses
</span>
                        <span >
<i class="fa fa-lightbulb-o" ></i> Allow student to test your self by Exam
</span>
            </div>
        </div>
    </div>

</div>

</div>

<div id="about" >
<div class="container">
    <div class="row text-center">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 sub-head">
            <h3  data-wow-delay="0.6s" class="wow rollIn animated" >
                <strong>ABOUT </strong></h3>
            <p class="sub-head">The current challenges facing traditional colleges and universities
                including higher tuition, budget cuts, and course shortages
                cause many students to search for alternatives.
                With nearly three million students currently enrolled in fully online programs
                and six million taking at least one online course as part of their degree,
                online education has clearly become one of the most popular higher education
                alternatives. The continually improving reputation of online learning helped fuel
                its expansion, as initial skepticism faltered in the face of evidence
                showing that online learning can be just as effective as face-to-face education
            </p>
        </div>
    </div>
    <div class="row ">
        <div class="col-lg-4 col-md-4">
            <div class="media wow rotateIn animated" data-wow-delay="0.4s">
                <div class="pull-left">
                    <i class="fa fa-recycle fa-4x  "></i>
                </div>
                <div class="media-body">
                    <h3 class="media-heading">Convenience, flexibility  </h3>

                    <p>

                        Online courses give students the opportunity to plan study time around the rest of their day, instead of the other way around. Students can study and work at their convenience. Course material is always accessible online, making special library trips unnecessary. All of these benefits help students balance work and family commitments with their education

                    </p>

                </div>
            </div>
            <div class="media wow rotateIn animated" data-wow-delay="0.5s">
                <div class="pull-left">
                    <i class="fa fa-history fa-4x  "></i>
                </div>
                <div class="media-body">
                    <h3 class="media-heading">Career advancement</h3>
                    <p> Students can take online courses and even complete entire degrees while working, while in-between jobs, or while taking time to raise a family. This academic work will explain any discontinuity or gaps in a resume as well. Also, earning a degree can show ambitiousness to prospective employers and a desire to remain informed and prepared for new challenges
                    </p>

                </div>
            </div>

        </div>

        <div class="col-lg-4 col-md-4 wow bounceInDown animated" style="padding: 10px;" data-wow-delay="0.7s">
            <div id="carousel-slider" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">
                    <div class="item">
                        <img class="img-thumbnail" src='{{asset("images/slider/5.jpg")}}'>

                    </div>
                    <div class="item">
                        <img class="img-thumbnail" src='{{asset("images/slider/6.jpg")}}'>

                    </div>
                    <div class="item active">
                        <img class="img-thumbnail" src='{{asset("images/slider/7.jpg")}}'>

                    </div>
                </div>
                <!--INDICATORS-->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-slider" data-slide-to="0" class=""></li>
                    <li data-target="#carousel-slider" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-slider" data-slide-to="2" class="active"></li>
                </ol>

            </div>

        </div>


        <div class="col-lg-4 col-md-4">

            <div class="media wow rotateIn animated" data-wow-delay="0.5s">
                <div class="pull-left">
                    <i class="fa fa-life-ring fa-4x  "></i>
                </div>
                <div class="media-body">
                    <h3 class="media-heading">Improve your technical skills </h3>
                    <p>
                        Even the most basic online course requires the development of new computer skills, as students learn to navigate different learning management systems (LMS) and programs. The participation skills students learn within their online courses translate to many professions, including creating and sharing documents, incorporating audio/video materials into assignments, completing online training sessions
                    </p>

                </div>
            </div>
            <div class="media wow rotateIn animated" data-wow-delay="0.6s">
                <div class="pull-left">
                    <i class="fa fa-life-ring fa-4x  "></i>
                </div>

                <div class="media-body">
                    <h3 class="media-heading">Lower total costs</h3>
                    <p>
                        Online programs prove a more affordable option than traditional colleges.
                        Though not all online degrees offer less expensive net tuition prices than
                        traditional colleges, associated expenses almost always cost less. For example,
                        there are no commuting costs, and sometimes required course materials,
                        such as textbooks, are available online at no cost. In addition,
                        many colleges and universities accept credits earned via free massive open online
                        courses (MOOCs), the most recent advance in online education.
                        These free online courses can help students fulfill general education requirements
                    </p>

                </div>
            </div>



        </div>


    </div>


    <div class="row pad-top-botm wow flipInX animated" data-wow-delay="0.10s">
        <div class="col-lg-8 col-md-8 col-sm-8 " >

            <h3><strong>What Exactly is eLearning?</strong></h3>
            <p>

                Arguably, anyone who has used a computer (mobile or not) to learn has completed some type of eLearning. Maybe it was called web-based training, or online learning, or computer-based training, but it’s all under the same category: eLearning. Think of eLearning is as the use of computers, tablets, or smartphones to educate or train individuals.

                We especially liked eLearningNC.gov's definition: "eLearning is learning utilizing electronic technologies to access educational curriculum outside of a traditional classroom. In most cases, it refers to a course, program, or degree delivered completely online."
            </p>

        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 text-center" >
            <!-- <i class="fa fa-lightbulb-o big-icon "></i>-->


        </div>

    </div>
</div>
</div>
<!--./ ABOUT SECTION END -->
<div class="donars-section">
<div class="overlay">
    <div class="container">
        <div class="row ">
            <div class="col-lg-12 col-md-12 ">
                <div id="testimonials" class="carousel slide" data-ride="carousel">

                    <ol class="carousel-indicators">
                        <li data-target="#testimonials" data-slide-to="0" class="active"></li>
                        <li data-target="#testimonials" data-slide-to="1" class=""></li>
                        <li data-target="#testimonials" data-slide-to="2" class=""></li>
                        <li data-target="#testimonials" data-slide-to="3" class=""></li>
                    </ol>

<div class="carousel-inner">
    <div class="item active">
<div class="container center">
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 slide-custom">

        <h4><i class="fa fa-quote-left"></i>website developed by mohamed safaa <i class="fa fa-quote-right"></i></h4>
        <div class="user-img pull-right">
            <img class="img-circle image-responsive" src='{{asset("images/aa.PNG")}}'>

        </div>
        <h5 class="pull-right"><strong class="c-black">mohamed safaa</strong></h5>
    </div>
</div>
    </div>
    <div class="item">
        <div class="container center">
            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 slide-custom">

                <h4><i class="fa fa-quote-left"></i>website developed by abdallah abuzead <i class="fa fa-quote-right"></i></h4>
                <div class="user-img pull-right">
                    <img class="img-circle image-responsive" src='{{asset("images/ab.png")}}'>

                </div>
                <h5 class="pull-right"><strong class="c-black">abdallah abuzead</strong></h5>
            </div>
        </div>
    </div>
    <div class="item">
<div class="container center">
<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 slide-custom">
<h4><i class="fa fa-quote-left"></i>website developed by mahmoud shtayeh <i class="fa fa-quote-right"></i></h4>
<div class="user-img pull-right">
<img class="img-circle image-responsive" src='{{asset("images/sh.png")}}'>

</div>
<h5 class="pull-right"><strong class="c-black">mahmoud shtayeh </strong></h5>
</div>
</div>
</div>
<div class="item">
<div class="container center">
<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 slide-custom">
<h4><i class="fa fa-quote-left"></i>website developed by Ibrahim elsafey  <i class="fa fa-quote-right"></i></h4>
<div class="user-img pull-right">
<img class="img-circle image-responsive" src='{{asset("images/ib.png")}}'>

{{--<img src="assets/img/user2.png" alt="" class="img-circle image-responsive">--}}
</div>
<h5 class="pull-right"><strong class="c-black">Ibrahim elsafey</strong></h5>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
