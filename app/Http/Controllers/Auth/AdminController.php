<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Ticket;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View {
        return view('auth.admin.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Show all tickets in the admin panel
     */
    public function dashboard(Request $request) {
        $perPage = $request->get('per_page', 5);
        $page = $request->get('page', 1);
        // Get all tickets from the different databases
        $tickets = Ticket::getPaginatedTickets($page, $perPage);
        return view('auth.admin.dashboard', compact('tickets'));
    }

    /**
     * View one ticket by admin
     */
    public function viewTicket(string $connection, string $id) {
        $ticket = Ticket::on($connection)->findOrFail($id);
        return view('auth.admin.ticket-view', compact('ticket', 'connection'));
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
