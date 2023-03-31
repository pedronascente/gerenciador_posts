<?php

namespace App\Models;

use App\Models\User;
use App\Models\Sessao;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artigo extends Model
{
    use HasFactory;

    /*
    *
    * Uma artigo pertence a uma categoria :
    *
    */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    /*
    *
    * Uma artigo é escrito por  um usuario :
    *
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sessoes()
    {
        return $this->belongsToMany(Sessao::class, "publicacoes"); //pertence a muitos
    }
}
