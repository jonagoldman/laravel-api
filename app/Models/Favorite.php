<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Favorite extends Model
{
    protected $fillable = [
        'user_id',
        'gif_id',
        'alias',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
