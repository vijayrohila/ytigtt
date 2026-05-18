<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreatorLinkUnlock extends Model
{
    protected $fillable = [
        'unlock_date',
        'platform',
        'access_token',
        'session_id',
        'ip_address',
        'clicked_at',
        'available_at',
        'expires_at',
        'used_at',
    ];

    protected function casts(): array
    {
        return [
            'unlock_date' => 'date',
            'clicked_at' => 'datetime',
            'available_at' => 'datetime',
            'expires_at' => 'datetime',
            'used_at' => 'datetime',
        ];
    }
}
