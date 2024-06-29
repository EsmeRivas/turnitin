<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Amparo extends Model
{
    use HasFactory;


    public function toca(): belongsTo
    {
        return $this->belongsTo(Toca::class);
    }

    public function quejosos(): hasMany
    {
        return $this->hasMany(Quejoso::class);
    }


}
