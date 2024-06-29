<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quejoso extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function amparo(): belongsTo
    {
        return $this->belongsTo(Amparo::class);
    }

    public function parte(): belongsTo
    {
        return $this->belongsTo(Parte::class);
    }
}
