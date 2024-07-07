<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'rol_id',
        'ctg_area_id',
        'persona_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * 
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function rol(): BelongsTo
    {
        return $this->belongsTo(Rol::class);
    }

    public function persona(): HasOne
    {
        return $this->HasOne(Persona::class);
    }

    public function ctg_area(): HasOne
    {
        return $this->HasOne(CtgArea::class);
    }

    public function mesa(): belongsTo
    {
        return $this->belongsTo(Mesa::class);
    }

    public function tocas(): hasMany
    {
        return $this->hasMany(Toca::class);
    }


}
