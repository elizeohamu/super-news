<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['descricao'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'categorias';

    public function noticias(){
        return $this->belongsTo(Noticia::class);
    }

    public function artigos(){
        return $this->belongsTo(Artigo::class);
    }
}
