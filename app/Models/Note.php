<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $table = 'notes';

    // Campos 
    protected $fillable = [
        'title',
        'description',
        'due_date',
        'user_id',
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo Tag 
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
