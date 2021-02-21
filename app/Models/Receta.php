<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'ingredientes',
        'preparacion',
        'imagen',
        'categoria_id',
    ];

    //obtener categoria receta de uno a uno

    public function categoria()
    {
        return $this->belongsTo(CategoriaReceta::class);
    }

    //obtener usuario que crea la receta

    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //likes recibidos
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes_receta');
    }
}
