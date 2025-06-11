<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    public function create() {
        return view('guest.tickets.create');
    }

    public function store(TicketRequest $request) {
        $ticketData = $request->validated();
        $connection = $ticketData['ticket_type'];

        /**
         * We can generate a unique ticket serial number if needed
         * by using a global ticket counter.
         * But for now, I used a unique random value for the ticket number
         */
        $ticketNumber = 'TKT_'.strtoupper(substr($connection, 0, 4).'_'.Str::random(8));

        $ticket = new Ticket();
        $ticket->setConnection($connection);
        $ticket->fill($ticketData);
        $ticket->ticket_number = $ticketNumber;
        $ticket->save();

        return redirect()->route('tickets.create')
            ->with('success', 'The ticket was sent successfully with ID : '.$ticketNumber);
    }
}
