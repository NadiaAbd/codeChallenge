<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketsReplies extends Model
{
    protected $fillable = [
        'ticket_id', 'content'
    ];
}
