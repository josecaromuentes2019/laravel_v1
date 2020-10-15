<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $fillable = [
        'titulo', 'categoria_id', 'ingredientes','preparacion','foto'
    ];

    /**
     * Relacion inversa FK de categorias en receta
     */
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
