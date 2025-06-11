@extends('layouts.app')

@section('title', 'View Ticket')

@section('content')
    <div class="row">
        <div class="col-md-8">

            {{--View one ticket--}}
            <div class="card">

                {{--Ticket ID--}}
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Ticket ID: {{ $ticket->ticket_number }}</h5>
                    <a href="{{ route('dashboard') }}" class="btn btn-sm btn-secondary">Back</a>
                </div>
                <div class="card-body">
                    <div class="row mb-3">

                        {{--Full Name--}}
                        <div class="col-md-6">
                            <strong>Full Name:</strong>
                            <p>{{ $ticket->name }}</p>
                        </div>

                        {{--Email--}}
                        <div class="col-md-6">
                            <strong>Email:</strong>
                            <p>{{ $ticket->email }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">

                        {{--Ticket Type--}}
                        <div class="col-md-6">
                            <strong>Ticket Type:</strong>
                            <p>
                            <span class="badge bg-info">
                                @switch($ticket->ticket_type)
                                    @case('technical') Technical Issues @break
                                    @case('billing') Account & Billing @break
                                    @case('product') Product & Service @break
                                    @case('general') General Inquiry @break
                                    @case('feedback') Feedback & Suggestions @break
                                @endswitch
                            </span>
                            </p>
                        </div>

                        {{--Status--}}
                        <div class="col-md-6">
                            <strong>Status:</strong>
                            <p>
                            <span class="badge bg-{{ $ticket->status == 'noted' ? 'success' : 'warning' }}">
                                {{ $ticket->status == 'noted' ? 'NOTED' : 'OPEN' }}
                            </span>
                            </p>
                        </div>
                    </div>

                    {{--Subject--}}
                    <div class="mb-3">
                        <strong>Subject:</strong>
                        <p>{{ $ticket->subject }}</p>
                    </div>

                    {{--Description--}}
                    <div class="mb-3">
                        <strong>Description:</strong>
                        <div class="border rounded p-3 bg-light">
                            {{ $ticket->description }}
                        </div>
                    </div>

                    {{--Created At--}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Created At:</strong>
                            <p>{{ $ticket->created_at->format('Y-m-d H:i:s') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
