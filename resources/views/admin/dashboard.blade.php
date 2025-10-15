@extends('layouts.admin')

@section('content')
<livewire:api-example />

    <div class="container-fluid">
        <h1 class="mb-4">Welcome to Admin Dashboard 🎉</h1>
        <p>You are logged in as <strong>{{ auth()->user()->name }}</strong> with role(s): 
            {{ auth()->user()->getRoleNames()->join(', ') }}
        </p>
    </div>
@endsection
