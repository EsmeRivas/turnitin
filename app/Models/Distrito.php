<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Distrito extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ctg_areas():hasMany
    {
        return $this->hasMany(CtgArea::class);
    }
    public function juzgado_origen():BelongsTo
    {
        return $this->belongsTo(JuzgadoOrigen::class);
    }
}
