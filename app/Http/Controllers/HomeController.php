<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Banner;
use App\Models\Noticia;
use App\Models\Artigo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){  
        $anuncios = Anuncio::all();
        $banners = Banner::all(); 
        $noticias = Noticia::all();   
        $artigos = Artigo::all();  
        return view('home', compact('anuncios', 'banners', 'noticias', 'artigos'));
    }

}
