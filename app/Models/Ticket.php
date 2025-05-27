<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'name', 'email', 'title', 'description',
        'ticket_type_id', 'project_id', 'assign_at', 'status'
    ];

    public function ticketType()
    {
        return $this->belongsTo(TicketType::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
