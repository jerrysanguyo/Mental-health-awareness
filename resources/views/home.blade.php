@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border shadow">
                <div class="card-body">
                    <!-- @if(session('recommendations'))
                        <div class="alert alert-info">
                            <h4>OpenAI Recommendations</h4>
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
                    @endif -->
                    @if($summary)
                        @foreach($summary as $sum)
                            <div class="alert alert-primary mt-4">
                                <h4>Summary of Recommendations</h4>
                                <p>{{ $sum->summary }}</p>
                            </div>
                        @endforeach
                    @endif
                    
                    @if(!$recomCheck)
                    <h1 class="mb-5">Mental Health Assessment</h1>
                        <form action="{{ route($userRole . '.response.store') }}" method="POST">
                            @csrf
                            @foreach($listOfAnswer->groupBy('question_id') as $questionId => $answers)
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <h2 class="question">{{ $answers->first()->question->name }}</h2>
                                    </div>
                                    <div class="row">
                                        @foreach($answers as $index => $answer)
                                            <div class="col-lg-3 col-md-6 col-sm-12 d-flex justify-content-center mb-2">
                                                <input type="hidden" name="responses[{{ $questionId }}][question_id]" value="{{ $questionId }}">
                                                <input type="radio" class="btn-check" name="responses[{{ $questionId }}][answer_id]" id="answer_{{ $answer->id }}" value="{{ $answer->id }}" autocomplete="off">
                                                <label class="btn btn-primary w-100" for="answer_{{ $answer->id }}">
                                                    {{ chr(65 + $index) }}. {{ $answer->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                        <hr>
                                    </div>
                                </div>
                            @endforeach
                            <input type="submit" value="Submit" class="btn btn-primary float-end">
                        </form>
                    @else
                    <div class="alert alert-info">
                        <h2 class="mb-3">OpenAI Recommendations for Your Assessment</h2>
                        @foreach($recommendations as $recom)
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
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
