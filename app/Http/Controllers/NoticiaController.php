<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Categoria;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::all();
        return view('noticia.index', compact('noticias'));
    }

    public function categoria($id)
    {
        $noticias = Noticia::where('categoria_id', $id)->get();
        $categorias = Categoria::all();
        return view('noticia.categoria', compact('noticias', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('noticia.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'titulo' => 'required|max:255',
            'texto' => 'required',
            'data' => 'required',
            'categoria_id' => 'required'
        ]);
        $noticia = Noticia::create($validateData);

        return redirect('/noticia')->with('success', 'Noticia criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticia = Noticia::findOrFail($id);
        $categorias = Categoria::all();
        return view('noticia.show', compact('noticia', 'categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia = Noticia::findOrFail($id);
        $categorias = Categoria::all();
        return view('noticia.edit', compact('noticia', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'titulo' => 'required|max:255',
            'texto' => 'required',
            'data' => 'required',
            'categoria_id' => 'required'
        ]);
        Noticia::whereId($id)->update($validateData);

        return redirect('/noticia')->with('success', 'Notícia alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->delete();

        return redirect('/noticia')->with('success', 'Notícia removida com sucesso!');
    }

}
