<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Esta função abaixo tenta encontrar o NOME DO MÉTODO _ id, 
    // ou seja ele vai ler o: user_id como chave estrangeira do Model Post.

    public function user()
    {
        // Um post pertence a um user obrigatóriamente, por isso usamos belongsTo()
        return $this->belongsTo(User::class);
    }

    protected $fillable = ['title', 'slug', 'content', 'user_id'];
}
