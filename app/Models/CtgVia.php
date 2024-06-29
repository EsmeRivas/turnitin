<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CtgVia extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ctg_tipo_recurso(): hasOne
    {
        return $this->hasOne(CtgTipoRecurso::class);
    }

    public function tocas(): hasMany
    {
        return $this->hasMany(Toca::class);
    }
}
