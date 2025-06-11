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
     * Update admin note
     */
    public function updateAdminNote(Request $request, string $connection, string $id) {
        // Prevent empty trix values: like: <div>&nbsp</div>, spaces, tabs, line breaks
        $trixText = $request->admin_note;
        $cleanedText = strip_tags($trixText);
        $cleanedText = html_entity_decode($cleanedText, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $cleanedText = preg_replace('/[\x20\xA0\t\n\r]+/u', '', $cleanedText);
        if (empty($cleanedText)) {
            return back()->withErrors(['admin_note' => 'Please enter your note *'])->withInput();
        }
        //
        $request->validate([
            'admin_note' => 'required|string',
        ],[
            'admin_note.required' => 'Please enter your note *',
        ]);
        $ticket = Ticket::on($connection)->findOrFail($id);
        $ticket->admin_note = $request->admin_note;
        $ticket->status = 'noted';
        $ticket->save();

        return redirect()->route('dashboard')
            ->with('success', 'Note was updated successfully');
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
