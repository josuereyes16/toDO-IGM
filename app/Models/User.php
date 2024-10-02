<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Relación con el modelo Note
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
