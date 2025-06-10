@extends('layouts.app')

@section('title', 'Admin Panel')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Admin Panel</h2>
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-outline-danger">Logout</button>
        </form>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Tickets</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="ticketsTable" class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Subject</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--Show all tickets--}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


