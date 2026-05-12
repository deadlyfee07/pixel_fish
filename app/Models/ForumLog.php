<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForumLog extends Model
{
    protected $fillable = [
        'user_id', 'bait_type', 'bait_amount',
        'fish_caught', 'ingredients', 'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
