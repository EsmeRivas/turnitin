<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Toca extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function observacions(): hasMany
    {
        return $this->hasMany(Observacion::class);
    }

    public function delitos(): hasMany
    {
        return $this->hasMany(Delito::class);
    }

    public function partes(): hasMany
    {
        return $this->hasMany(Parte::class);
    }

    public function personal_autorizados(): hasMany
    {
        return $this->hasMany(Parte::class);
    }

    public function ctg_tipo_recurso(): belongsTo
    {
        return $this->belongsTo(CtgTipoRecurso::class);
    }

    public function ctg_area(): belongsTo
    {
        return $this->belongsTo(CtgArea::class);
    }

    public function mesa(): belongsTo
    {
        return $this->belongsTo(CtgMesa::class);
    }

    public function ctg_via(): belongsTo
    {
        return $this->belongsTo(CtgVia::class);
    }

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ctg_juez(): belongsTo
    {
        return $this->belongsTo(CtgJuez::class);
    }

    public function ctg_ponencia(): belongsTo
    {
        return $this->belongsTo(CtgPonencia::class);
    }

    public function amparos(): belongsTo
    {
        return $this->belongsTo(Amparo::class);
    }

    public function ctg_apelo(): belongsTo
    {
        return $this->belongsTo(CtgApelo::class);
    }

    public function juzgado_origens(): belongsTo
    {
        return $this->belongsTo(JuzgadoOrigen::class);
    }
}
