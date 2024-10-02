<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // Definir la tabla (opcional, Laravel lo asume automáticamente)
    protected $table = 'tags';

    
    protected $fillable = [
        'name',
    ];

    // Relación con el modelo Note
    public function notes()
    {
        return $this->belongsToMany(Note::class);
    }
}
