<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Observacion extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function toca(): belongsTo
    {
        return $this->belongsTo(Toca::class);
    }
}
