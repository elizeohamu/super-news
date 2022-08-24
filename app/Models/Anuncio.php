<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    use HasFactory;

    protected $fillable = ['descricao', 'size'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'anuncio';

    public function listanuncio(){
        $anuncio = Anuncio::orderBy('descricao')->get();
        return view('anuncio.list',compact('anuncio'));
    }
}
