<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    public static function getAllTickets() {
        $allTickets = collect();
        $connections = ['technical', 'billing', 'product', 'general', 'feedback'];

        foreach ($connections as $connection) {
            $tickets = self::on($connection)->get();
            $allTickets = $allTickets->merge($tickets);
        }

        return $allTickets->sortByDesc('created_at');
    }
}
