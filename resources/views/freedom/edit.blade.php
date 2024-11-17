@extends('layouts.page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="d-flex justify-content-between align-content-center">
                            <h1>Update post</h1>
                            <a href="{{ route('freedomwall.index') }}">
                                <button type="button" class="btn btn-primary">Back</button>
                            </a>
                        </div>
                    </div>
                    <div class="row mt-3">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="">
                            <div class="row">
                                <form action="{{ route('freedomwall.update', $freedomwall->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="createPostModalLabel">What's on your mind?</h1>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="nick_name" class="form-label">Nick name:</label>
                                            <input type="text" name="nick_name" id="nick_name" value="{{ $freedomwall->nick_name }}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title:</label>
                                            <input type="text" name="title" id="title" value="{{ $freedomwall->title }}" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="post" class="form-label">What's on your mind?</label>
                                            <textarea class="form-control" name="post" id="post" rows="4" required>{{ $freedomwall->post }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" value="Update" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection