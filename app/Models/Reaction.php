<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'reaction',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo( User::class );
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo( Post::class );
    }

}
