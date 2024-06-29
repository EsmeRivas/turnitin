<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Mesa extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ctg_mesa(): HasOne
    {
        return $this->HasOne(CtgMesa::class);
    }

    public function tocas(): hasMany
    {
        return $this->hasMany(Toca::class);
    }

    public function ctg_area(): HasOne
    {
        return $this->HasOne(CtgArea::class);
    }

    public function user(): HasOne
    {
        return $this->HasOne(User::class);
    }
}
