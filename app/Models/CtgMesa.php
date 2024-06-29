<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CtgMesa extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mesa(): BelongsTo
    {
        return $this->belongsTo(Mesa::class);
    }
}
