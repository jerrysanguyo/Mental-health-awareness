@extends('layouts.page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="d-flex justify-content-between align-content-center">
                            <h1>FREEDOM WALL!!!</h1>
                            <!-- Button trigger modal for creating a new post -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPostModal">
                                What's on your mind?
                            </button>
                            @include('freedom.create')
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="">
                            <div class="row">
                            @foreach($posts as $post)
                                <div class="col-lg-3 col-md-6 col-sm-12 mt-2">
                                    <div class="card border shadow" style="min-height:250px; max-height:300px">
                                        <div class="card-body">
                                            <h4>{{ $post->title }}</h4>
                                            <hr>
                                            <p>{{ Str::limit($post->post, 100) }}</p>
                                        </div>
                                        <div class="card-footer">
                                            <!-- Button to trigger modal for this specific post -->
                                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#viewPostModal{{ $post->id }}">
                                                View more
                                            </button>
                                            <a href="{{ route('freedomwall.edit', $post->id) }}">
                                                <button type="button" class="btn btn-primary">Edit</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal for Viewing More Details of Each Post -->
                                <div class="modal fade" id="viewPostModal{{ $post->id }}" tabindex="-1" aria-labelledby="viewPostModalLabel{{ $post->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="viewPostModalLabel{{ $post->id }}">{{ $post->title }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>{{ $post->post }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection