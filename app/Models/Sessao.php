<?php

namespace App\Models;

use App\Models\Artigo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sessao extends Model
{
    use HasFactory;
    protected  $table = 'sessoes';

    public function artigos()
    {
        return $this->belongsToMany(Artigo::class, "publicacoes"); //pertence a muitos
    }
}
