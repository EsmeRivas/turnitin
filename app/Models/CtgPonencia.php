<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CtgPonencia extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tocas():hasMany
    {
        return $this->hasMany(Toca::class);
    }

    public function ctg_ponente():hasOne
    {
        return $this->hasOne(CtgPonente::class);
    }
    public function ctg_area():hasOne
    {
        return $this->hasOne(CtgArea::class);
    }

}
