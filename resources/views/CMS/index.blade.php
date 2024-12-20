@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-1">
        <span class="fs-3">{{ strtoupper($pageTitle) }}</span>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create{{ $pageTitle }}">
            Create a {{ $pageTitle }}
        </button>
        @include('cms.create')
    </div>
    <div class="card shadow border-0">
        <div class="card-body">
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
            <table class="table table-striped" id="data-table">
                <thead>
                    <tr>
                        @foreach($columns as $column)
                            <th>{{ $column }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        @if($pageTitle === 'answer' )
                            <td>{{ $item->question->name ?? 'N/A' }}</td>
                        @endif
                        <td>{{ $item->name ?? 'N/A' }}</td>
                        <td>{{ $item->remarks ?? 'N/A' }}</td>
                        <td>{{ $item->createdBy->full_name ?? 'N/A' }}</td>
                        <td>{{ $item->updatedBy->full_name ?? 'N/A' }}</td>
                        <td>
                            <div class="dropdown">
                                <a href="" class="btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route($userRole . '.' . $pageTitle . '.edit', [$pageTitle => $item->id]) }}" class="dropdown-item">Edit</a>
                                    </li>
                                    @if($userRole === 'superadmin')
                                        <li>
                                            <form action="{{ route($userRole . '.' . $pageTitle . '.destroy', [$pageTitle => $item->id]) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this {{ $pageTitle }}?')">Delete</button>
                                            </form>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <form action="{{ route('superadmin.table.seed') }}" method="post">
                @csrf
                <input type="hidden" name="seed" value="{{ $pageTitle }}">
                <input type="submit" value="Seed" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#data-table').DataTable({
            "processing": true,
            "serverSide": false,
            "pageLength": 10,
            "order": [[0, "desc"]],
        });
    });
</script>
@endpush
@endsection