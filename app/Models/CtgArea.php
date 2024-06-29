<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CtgArea extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mesa(): belongsTo
    {
        return $this->belongsTo(Mesa::class);
    }

    public function distrito(): belongsTo
    {
        return $this->belongsTo(Distrito::class);
    }

    public function ctg_ponencia(): belongsTo
    {
        return $this->belongsTo(CtgPonencia::class);
    }

    public function usuario(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tocas(): hasMany
    {
        return $this->hasMany(Toca::class);
    }
}
