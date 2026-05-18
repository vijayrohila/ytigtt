<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreatorLinkSubmission extends Model
{
    protected $fillable = [
        'submission_date',
        'platform',
        'submitted_link',
        'access_token',
        'session_id',
        'ip_address',
        'submitted_at',
    ];

    protected function casts(): array
    {
        return [
            'submission_date' => 'date',
            'submitted_at' => 'datetime',
        ];
    }
}
