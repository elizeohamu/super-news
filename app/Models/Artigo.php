<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artigo extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'texto', 'data','categoria_id'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'artigos';  

    public function home(){
        return $this->belongsTo(Home::class);
    }

    public function categorias(){
        return $this->hasMany(Categoria::class);
    }
}

