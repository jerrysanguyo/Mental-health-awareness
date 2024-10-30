@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border shadow">
                <div class="card-body">
                    {{-- Display Recommendations if they exist --}}
                    @if(session('recommendations'))
                        <div class="alert alert-info">
                            <h4>GPT Recommendations</h4>
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
                    @if(!$recomCheck)
                    <h2 class="mb-3">Mental Health Assessment</h2>
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
                    @else
                        @if($recommendation)
                        <h2 class="mb-3">AI Recommendations for Your Assessment</h2>
                            @foreach($recommendation as $recom)
                                <div class="row">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <h5>Question:</h5>
                                        </div>
                                        <div class="col-lg-10">
                                            <!-- can't fetch instantly. -->
                                            <span>{{ $recom->response->question->name ?? '' }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <h5>Answer:</h5>
                                        </div>
                                        <div class="col-lg-10">
                                            <span>{{ $recom->response->answer->name ?? '' }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <h5>Recommendation:</h5>
                                        </div>
                                        <div class="col-lg-10">
                                            <span>{{ $recom->recommendation ?? '' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
