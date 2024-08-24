<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JuzgadoOrigen extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function distritos():HasMany
    {
        return $this->hasMany(Distrito::class);
    }
}
