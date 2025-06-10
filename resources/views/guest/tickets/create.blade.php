@extends('layouts.app')

@section('title', 'New Ticket')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Create New Support Ticket</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('tickets.store') }}" method="POST">
                        @csrf

                        <div class="row">

                            {{--Full Name--}}
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Full Name *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{--Email--}}
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">

                            {{--Ticket Type--}}
                            <div class="col-md-6 mb-3">
                                <label for="ticket_type" class="form-label">Ticket Type *</label>
                                <select class="form-select @error('ticket_type') is-invalid @enderror"
                                        id="ticket_type" name="ticket_type">
                                    <option value="">Select Ticket Type</option>
                                    <option value="technical" {{ old('ticket_type') == 'technical' ? 'selected' : '' }}>
                                        Technical Issues
                                    </option>
                                    <option value="billing" {{ old('ticket_type') == 'billing' ? 'selected' : '' }}>
                                        Account & Billing
                                    </option>
                                    <option value="product" {{ old('ticket_type') == 'product' ? 'selected' : '' }}>
                                        Product & Service
                                    </option>
                                    <option value="general" {{ old('ticket_type') == 'general' ? 'selected' : '' }}>
                                        General Inquiry
                                    </option>
                                    <option value="feedback" {{ old('ticket_type') == 'feedback' ? 'selected' : '' }}>
                                        Feedback & Suggestions
                                    </option>
                                </select>
                                @error('ticket_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{--Subject--}}
                            <div class="col-md-6" class="mb-3">
                                <label for="subject" class="form-label">Subject *</label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                       id="subject" name="subject" value="{{ old('subject') }}">
                                @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{--Description--}}
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description *</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                              id="description" name="description"
                                              rows="5">{{ old('description') }}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{--Submit Button--}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Send Ticket</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
