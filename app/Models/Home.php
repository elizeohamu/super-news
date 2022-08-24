<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;  

    public function anuncio(){
        return $this->hasMany(Anuncio::class);
    }
    
    public function banner(){
        return $this->hasMany(Banner::class);
    }

    public function noticias(){
        return $this->hasMany(Noticia::class);
    }

    public function artigos(){
        return $this->hasMany(Artigo::class);
    }
}
