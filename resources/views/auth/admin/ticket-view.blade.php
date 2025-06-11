@extends('layouts.app')

@section('title', 'View Ticket')

@section('content')
    <div class="row justify-content-center px-3">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow rounded-4 border-0 mb-5">
                <div
                    class="card-header bg-white border-bottom-0 d-flex flex-wrap justify-content-between align-items-center px-4 py-3">
                    <h5 class="mb-2 mb-md-0">
                        Ticket ID: <span class="text-primary">{{ $ticket->ticket_number }}</span>
                    </h5>
                    <a href="{{ route('dashboard') }}" class="btn btn-sm btn-outline-secondary">Back</a>
                </div>

                <div class="card-body px-4 py-4">

                    {{-- Full Name & Email --}}
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Full Name</label>
                            <input type="text" class="form-control" value="{{ $ticket->name }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="text" class="form-control" value="{{ $ticket->email }}" readonly>
                        </div>
                    </div>

                    {{-- Ticket Type & Status --}}
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Ticket Type</label>
                            <div class="form-control bg-light d-flex align-items-center" style="height: 45px;">
                                <span class="badge bg-info text-white px-3 py-2 rounded-pill"
                                      style="font-size: 0.75rem;">
                                    @switch($ticket->ticket_type)
                                        @case('technical') Technical Issues @break
                                        @case('billing') Account & Billing @break
                                        @case('product') Product & Service @break
                                        @case('general') General Inquiry @break
                                        @case('feedback') Feedback & Suggestions @break
                                    @endswitch
                                </span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Status</label>
                            <div class="form-control bg-light d-flex align-items-center" style="height: 45px;">
                                <span
                                    class="badge bg-{{ $ticket->status === 'noted' ? 'success' : 'warning' }} text-white px-3 py-2 rounded-pill"
                                    style="font-size: 0.75rem;">
                                    {{ strtoupper($ticket->status) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Subject --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Subject</label>
                        <input type="text" class="form-control" value="{{ $ticket->subject }}" readonly>
                    </div>

                    {{-- Description --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Description</label>
                        <div class="border rounded bg-light p-3"
                             style="max-height: 200px; overflow-y: auto; padding-left: 1.25rem;">
                            {{ $ticket->description }}
                        </div>
                    </div>

                    {{-- Created At --}}
                    <hr class="my-4">
                    <div class="text-end text-muted small" style="font-family: monospace;">
                        Created on {{ $ticket->created_at->timezone('Asia/Dubai')->format('d M Y, H:i A') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
