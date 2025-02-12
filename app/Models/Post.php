<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_topico',
        'titulo',
        'descricao',
        'imagem',
        'id_user',
    ];

    public function store(Request $request): RedirectResponse
    {
        //
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $request->user()->chirps()->create($validated);

        return redirect(route('/'));
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentarios::class, 'id_post');
    }

    public function curtidaspost()
    {
        return $this->hasMany(Curtidaspost::class, 'id_post');
    }
}
