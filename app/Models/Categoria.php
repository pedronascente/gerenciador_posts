<?php

namespace App\Models;

use App\Models\Artigo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;

    /*
    *
    * Uma categoria tem muitos :
    *
    */
    public function artigos()
    {
        return $this->hasMany(Artigo::class);
    }
}
