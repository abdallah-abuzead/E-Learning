@extends('navbar')

<link rel="stylesheet" href="{{ asset('css/add-questions-style.css') }}">

@section('content')
    <div class="container add-exam">
        <div class="add-exam-course">
            <div class="subject-header"> Subject </div>
            <div class="subject-body container">
                {{ Session::get('subject') }}
            </div>
            <img src="{{ asset('/images/add-exam.png') }}" alt="profile">
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading"> Add Exam Questions </div>
            <div class="exam-title">
                {{ Session::get("exam_title") }} Exam
            </div>
            <div class="panel-body add-exam-div">
                <form id="add-quest-form" action="{{ url('store-question') }}" method="post">
                    @csrf
                    <div class="add-exam-form">
                        <div class="form-group">
                            <textarea class="form-control" name="title" form="add-quest-form" placeholder="Question" required></textarea>
                        </div>
                        <div class="row form-group options-group">
                            <div class="col-md-10 options">
                                <input type="text" class="form-control option" placeholder="A." name="A" required/>
                                <input type="text" class="form-control option" placeholder="B." name="B" required/>
                            </div>
                            <div style="text-align: right;" class="col-md-2">
                                <img id="add-option-btn" class="active-btn" src="{{ asset('images/add-option.png') }}" alt="add-option">
                                <img id="cancel-option-btn" src="{{ asset('images/cancel-option.png') }}" alt="cancel-option"
                                     style="margin-left: 10px;" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <select class="form-control" id="correct-ans" name="correct-ans" required>
                                <option value="-1">- Select The Correct Answer -</option>
                                <option value="0">A</option>
                                <option value="1">B</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Mark" name="mark" required/>
                        </div>
                        <div class="submit-group">
                            <input type="submit" id="btn-add" class="btn btn-primary" value="Add Question">
                            <a id="btn-submit" class="btn btn-outline-primary" href="{{ url('/') }}">
                                Finished
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">Added Questions</div>
            <div class="panel-body add-exam-div">
                <div class='row'>
                @if(!empty($questions) && !$questions->isEmpty())
                    @foreach($questions as $question)
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail item-box" style="border: 1px solid #03A9F4;">
                                <div class="question-header">
                                    <img src="{{ asset('images/delete.png') }}" alt="delete-question" alt="delete-question"
                                    onclick="window.location.href ='/delete-question/'+ {{ $question->id }}">

                                    <span>
                                        {{ $question->mark }}
                                    </span>
                                </div>

                                <div class="question-body" style="padding: 10px;">
                                    <p class="question-title">
                                        {{ $question->title }}
                                    </p>
                                    <div class="options-panel">
                                        @foreach($question->options as $option)
                                        <div>
                                            {{ $option->value }}
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="question-ans">
                                        <p>
                                            <strong style="color: #0030ff">Correct answer: </strong> {{ $question->correctAnswer->value }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    No Questions Added
                @endif
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jQuery 4.3.1.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("#add-option-btn").click(function (e) {
                if($("#add-option-btn").hasClass("active-btn")) {
                    if($(".option").last().attr('name') === "B") {
                        $newVal = 2;
                        $newChar = "C";
                        $("#cancel-option-btn").addClass("active-btn");
                    } else if($(".option").last().attr("name") === "C") {
                        $newVal = 3;
                        $newChar = "D";
                        $("#add-option-btn").removeClass("active-btn");
                    }
                    $("#correct-ans").append("<option value='" + $newVal + "'>" + $newChar + "</option>");
                    $(".options").append("<input type='text' class='form-control option' placeholder=" + $newChar
                        + ". name=" + $newChar + " required/>");
                }
            });

            $("#cancel-option-btn").click(function (e) {
                if($("#cancel-option-btn").hasClass("active-btn")) {
                    if($(".option").last().attr('name') === "D") {
                        $("#add-option-btn").addClass("active-btn");
                    } else if($(".option").last().attr("name") === "C") {
                        $("#cancel-option-btn").removeClass("active-btn");
                    }
                    $("#correct-ans").children().last().remove();
                    $(".options").children().last().remove();
                }
            });
        });
    </script>
@endsection
