@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border shadow">
                <div class="card-body">
                    <h2 class="mb-5">Mental Health Assessment</h2>

                    {{-- Display Recommendations if they exist --}}
                    @if(session('recommendations'))
                        <div class="alert alert-info">
                            <h4>Personalized Recommendations</h4>
                            <ul class="list-unstyled">
                                @foreach(session('recommendations') as $recommendation)
                                    <li class="mb-3">
                                        <strong>Question:</strong> {{ $recommendation['question'] }}<br>
                                        <strong>Your Answer:</strong> {{ $recommendation['answer'] }}<br>
                                        <strong>Recommendation:</strong> {{ $recommendation['recommendation'] }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form for answering questions --}}
                    <form action="{{ route($userRole . '.response.store') }}" method="POST">
                        @csrf
                        @foreach($listOfAnswer->groupBy('question_id') as $questionId => $answers)
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h4>Question: {{ $answers->first()->question->name }}</h4>
                                    @foreach($answers as $index => $answer)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="responses[{{ $questionId }}][answer_id]" id="answer_{{ $answer->id }}" value="{{ $answer->id }}">
                                            <input type="hidden" name="responses[{{ $questionId }}][question_id]" value="{{ $questionId }}">
                                            <label class="form-check-label" for="answer_{{ $answer->id }}">
                                                {{ chr(65 + $index) }}. {{ $answer->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
