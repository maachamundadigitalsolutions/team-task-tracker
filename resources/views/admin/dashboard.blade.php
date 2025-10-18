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

@role('admin')
<a href="{{ route('admin.dashboard') }}" class="nav-link">
    <i class="nav-icon fas fa-user-shield"></i>
    <p>Admin Dashboard</p>
</a>
@endrole

@role('user')
<a href="{{ route('user.dashboard') }}" class="nav-link">
    <i class="nav-icon fas fa-user"></i>
    <p>User Dashboard</p>
</a>
@endrole
