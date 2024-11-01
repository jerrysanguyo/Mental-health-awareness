@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border shadow">
                <div class="card-body">
                    <!-- Loading Spinner HTML -->
                    <div id="loading-spinner" style="display:none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.8); z-index: 9999; display: flex; align-items: center; justify-content: center; flex-direction: column;">
                        <div class="spinner" style="margin-bottom: 15px;"></div>
                        <span style="font-size: 18px; color: #333;">OpenAI is still generating your recommendation, please wait...</span>
                    </div>

                    <!-- Summary Container -->
                    <div id="summary">
                        @if($summary)
                            @foreach($summary as $sum)
                            <div class="alert alert-primary mt-4">
                                <h4>Summary of Recommendations by OpenAI</h4>
                                <p>{{ $sum->summary }}</p>
                            </div>
                            @endforeach
                        @endif
                    </div>

                    <!-- Recommendations Container -->
                    <div id="recommendations">
                        @if($recomCheck)
                            <div class="alert alert-info">
                                <h2 class="mb-3">OpenAI Recommendations for Your Assessment</h2>
                                @foreach($recommendations as $recom)
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <h5>Question:</h5>
                                        </div>
                                        <div class="col-lg-10">
                                            <span>{{ $recom->response->question->name ?? '' }}</span>
                                        </div>
                                        <div class="col-lg-2">
                                            <h5>Answer:</h5>
                                        </div>
                                        <div class="col-lg-10">
                                            <span>{{ $recom->response->answer->name ?? '' }}</span>
                                        </div>
                                        <div class="col-lg-2">
                                            <h5>Recommendation:</h5>
                                        </div>
                                        <div class="col-lg-10">
                                            <span>{{ $recom->recommendation ?? '' }}</span>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        @endif
                    </div>

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
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Show spinner on browser navigation and form submissions
    window.addEventListener('beforeunload', function() {
        document.getElementById('loading-spinner').style.display = 'flex';
    });

    // Hide spinner once the page has fully loaded
    window.addEventListener('load', function() {
        document.getElementById('loading-spinner').style.display = 'none';
    });
</script>

@endsection
