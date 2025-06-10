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
}
