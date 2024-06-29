<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Parte extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function toca(): belongsTo
    {
        return $this->belongsTo(Toca::class);
    }

    public function quejosos(): hasMany
    {
        return $this->hasMany(Quejoso::class);
    }

    public function ctg_tipo_partes(): belongsTo
    {
        return $this->belongsTo(CtgTipoParte::class);
    }

    public function persona(): belongsTo
    {
        return $this->belongsTo(Persona::class);
    }
}
