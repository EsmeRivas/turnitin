<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Persona extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $incrementing = true;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ctg_juez(): BelongsTo
    {
        return $this->belongsTo(CtgJuez::class);
    }

    public function ctg_ponente(): BelongsTo
    {
        return $this->belongsTo(CtgPonente::class);
    }

    public function partes(): hasMany
    {
        return $this->hasMany(Parte::class);
    }
}
