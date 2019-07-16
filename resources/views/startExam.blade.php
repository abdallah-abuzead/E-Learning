@extends('navbar')

<link rel="stylesheet" href="{{ asset('css/start-exam-style.css') }}">

@section('content')
    <div class="container start-exam-container">
        <div class="start-exam-course">
            <div class="subject-header"> Subject </div>
            <div class="subject-body container">
                {{ $exam->course->subject }}
            </div>
            <img src="{{ asset('/images/add-exam.png') }}" alt="profile">
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading"> {{ $exam->title }} Exam </div>
            <div class="exam-title">
                <strong> {{ $exam->duration }} </strong>
            </div>
            <div class="panel-body start-exam-div">
                <form id="myForm" action="{{ url('check-result/'.$exam->id) }}" method="post">
                    @csrf
                    @foreach($exam->questions as $question)
                        <div class="start-exam-form">
                            <div>
                                <p class="question-head" name="title"> {{ $question->title }} </p>
                            </div>
                            <div class="form-group options-group">
                                @foreach($question->options as $option)
                                    <div class="form-check">
                                        <input type="radio" class="form-check" name="{{ $question->id }}"
                                               value="{{ $option->id }}" id="{{ $option->id }}">
                                        <label class="form-check-label" for="{{ $option->id }}">
                                            {{ $option->value }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="question-mark">
                                <span class="mark-span">{{ $question->mark }} Marks</span>
                            </div>
                        </div>
                    @endforeach
                    <div class="submit-questions">
                        <input type="submit" id="btn-add" class="btn btn-danger" value="Finished">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jQuery 4.3.1.js') }}"></script>
    <script>
        $(document).ready(function () {
            var duration = "{{ $exam->duration }}";
            duration = duration.split(":");
            var hours = duration[0];
            var mins = duration[1];
            var sec = duration[2];

            var countDown = setInterval(function() {
                if(sec - 1 < 0) {
                    sec = 59;
                    if(mins - 1 < 0 ) {
                        mins = 59;
                        if(hours - 1 < 0) {
                            clearInterval(countDown);
                            $(window).unbind('beforeunload');
                            $("#myForm").submit();
                            return;
                        } else {
                            hours--;
                        }
                    } else {
                        mins--;
                    }
                } else {
                    sec--;
                }

                $('.exam-title strong').text(hours + ":" + mins + ":" + sec);
            }, 1000);

            $(window).bind('beforeunload', function() {
                return true;
            });
        });
    </script>
@endsection
