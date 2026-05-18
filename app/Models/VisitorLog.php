<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorLog extends Model
{
    protected $fillable = [
        'session_id',
        'ip_address',
        'user_agent_hash',
        'visited_on',
    ];

    protected function casts(): array
    {
        return [
            'visited_on' => 'date',
        ];
    }
}
