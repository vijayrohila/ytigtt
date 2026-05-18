<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreatorLinkWinner extends Model
{
    protected $fillable = [
        'winner_date',
        'platform',
        'submission_id',
        'winner_link',
        'clicks',
    ];

    protected function casts(): array
    {
        return [
            'winner_date' => 'date',
            'clicks' => 'integer',
        ];
    }
}
