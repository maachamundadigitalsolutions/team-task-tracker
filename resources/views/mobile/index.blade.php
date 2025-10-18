@extends('layouts.admin') {{-- જો તમે adminLTE layout use કરો છો તો એ extend કરો --}}

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">📱 Mobile User Dashboard</h1>

    <div class="card">
        <div class="card-body">
            <p>Welcome, {{ auth()->user()->name }}!</p>
            <p>This is your mobile user dashboard.</p>
        </div>
    </div>

    {{-- Example: show user-specific tasks --}}
    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">My Tasks</h3>
        </div>
        <div class="card-body">
            <ul>
                @foreach($tasks as $task)
                    <li>{{ $task->title }} - {{ ucfirst($task->status) }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
