<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CtgTipoRecurso extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tocas(): hasMany
    {
        return $this->hasMany(Toca::class);
    }

    public function ctg_via(): belongsTo
    {
        return $this->belongsTo(CtgVia::class);
    }
}
