@extends('adminlte::page')

@section('title', 'Admin Dashboard')

@section('content_header')
    <h1>Admin Dashboard</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p>
                Logged in as: <strong>{{ auth()->user()->name }}</strong><br>
                Email: <strong>{{ auth()->user()->email }}</strong>
            </p>

            <p>
                Role(s): {{ auth()->user()->getRoleNames()->join(', ') }}
            </p>
        </div>
    </div>

    {{-- Example: Quick links for User Management --}}
    @role('admin')
    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">User Management</h3>
        </div>
        <div class="card-body">
            <a  class="btn btn-primary">All Users</a>
            <a class="btn btn-success">Add User</a>

        </div>
    </div>
    @endrole
@stop

@section('js')
    @vite(['resources/js/app.js']) 
@stop
