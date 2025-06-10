<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function create() {
        return view('guest.tickets.create');
    }

    public function store(TicketRequest $request) {
        $ticketData = $request->validated();
        dd($ticketData);
    }
}
