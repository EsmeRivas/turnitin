<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CtgPonente extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ctg_ponencia(): BelongsTo
    {
        return $this->belongsTo(CtgPonencia::class);
    }

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class);
    }
    
    public function user(): hasOne
    {
        return $this->hasOne(User::class);
    }
}
