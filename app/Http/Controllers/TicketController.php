<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function create() {
        return view('guest.tickets.create');
    }

    public function store(Request $request) {

    }
}
