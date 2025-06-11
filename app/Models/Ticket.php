<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class Ticket extends Model
{
    protected $fillable = [
        'ticket_number',
        'ticket_type',
        'name',
        'email',
        'subject',
        'description',
        'status',
    ];

    /**
     * Get all tickets from the different databases
     */
    public static function getPaginatedTickets($page = 1, $perPage = 5) {
        $allTickets = collect();
        $connections = ['technical', 'billing', 'product', 'general', 'feedback'];

        foreach ($connections as $connection) {
            $tickets = self::on($connection)->get();
            $allTickets = $allTickets->merge($tickets);
        }

        $sortedTickets =  $allTickets->sortByDesc('created_at');
        $total = $sortedTickets->count();
        $offset = ($page - 1) * $perPage;
        // Tickets for the current page
        $items = $sortedTickets->slice($offset, $perPage);

        // Return a customized pagination Object
        return new LengthAwarePaginator(
            $items,
            $total,
            $perPage,
            $page,
            [
                'path' => request()->url(),
                'pageName' => 'page',
            ]
        );
    }
}
