<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'topico',
        'titulo',
        'descricao',
        'imagem',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentarios::class, 'id_post');
    }

}
