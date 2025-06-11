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
            @if($tickets->isNotEmpty())
                <div class="table-responsive">
                    <table id="ticketsTable" class="table table-hover align-middle">
                        <thead>
                        <tr>
                            <th>Ticket ID</th>
                            <th>Full Name</th>
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
                        @foreach($tickets as $ticket)
                            <tr>

                                {{--Ticket ID--}}
                                <td>
                                <span
                                    class="badge bg-dark-subtle text-dark border border-secondary px-2 py-2 rounded-3 shadow-sm d-inline-block text-center"
                                    style="font-size: 0.75rem; min-width: 150px; font-family: monospace;">
                                    <i class="bi bi-hash me-1"></i>
                                    {{ $ticket->ticket_number }}
                                </span>
                                </td>

                                {{--Full Name--}}
                                <td>
                                    <span class="fw-semibold">{{ $ticket->name }}</span>
                                </td>

                                {{--Email--}}
                                <td>
                                    <span class="text-secondary" style="font-size: 0.9rem;">{{ $ticket->email }}</span>
                                </td>

                                {{--Ticket Type--}}
                                @php
                                    $types = [
                                        'technical' => ['label' => 'Technical', 'color' => 'primary', 'icon' => 'wrench'],
                                        'billing' => ['label' => 'Billing', 'color' => 'warning', 'icon' => 'credit-card'],
                                        'product' => ['label' => 'Product', 'color' => 'success', 'icon' => 'box'],
                                        'general' => ['label' => 'General', 'color' => 'info', 'icon' => 'question-circle'],
                                        'feedback' => ['label' => 'Feedback', 'color' => 'secondary', 'icon' => 'chat-dots'],
                                    ];
                                    $typeInfo = $types[$ticket->ticket_type] ?? ['label' => 'Unknown', 'color' => 'dark', 'icon' => 'exclamation-triangle'];
                                @endphp
                                <td>
                                <span
                                    class="badge bg-{{ $typeInfo['color'] }} text-white d-inline-flex align-items-center gap-1 px-3 py-2 rounded-pill"
                                    style="min-width: 105px; font-size: 0.75rem;">
                                    <i class="bi bi-{{ $typeInfo['icon'] }}"></i>
                                    {{ $typeInfo['label'] }}
                                </span>
                                </td>

                                {{--Ticket Subject--}}
                                <td>
                                <span title="{{ $ticket->subject }}" class="fw-semibold">
                                    {{ Str::limit($ticket->subject, 15) }}
                                </span>
                                </td>

                                {{--Ticket Description--}}
                                <td>
                                <span title="{{ $ticket->description }}" class="text-secondary"
                                      style="font-size: 0.9rem;">
                                    {{ Str::limit($ticket->description, 15) }}
                                </span>
                                </td>

                                {{--Ticket Status--}}
                                <td>
                                <span class="badge bg-{{ $ticket->status == 'noted' ? 'success' : 'warning' }}">
                                    {{ $ticket->status }}
                                </span>
                                </td>

                                {{--Ticket Created At--}}
                                <td>
                                <span style="font-family: monospace; font-size: 0.85rem;" class="text-muted">
                                    {{ $ticket->created_at->format('d M Y, H:i') }}
                                </span>
                                </td>

                                {{--View Ticket--}}
                                <td>
                                    <a href="#" class="btn btn-sm btn-danger border shadow-sm" title="View Ticket">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination Links -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div>
                        {{ $tickets->appends(request()->query())->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <div class="fs-1 text-muted">📭</div>
                    <h5 class="mt-3">No Tickets Found</h5>
                </div>
            @endif
        </div>
    </div>
@endsection


