<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Delito extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function toca(): belongsTo
    {
        return $this->belongsTo(Toca::class);
    }

    public function ctg_delito(): belongsTo
    {
        return $this->belongsTo(CtgDelito::class);
    }
}
