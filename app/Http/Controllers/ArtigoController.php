<?php

namespace App\Http\Controllers;

use App\Models\Artigo;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ArtigoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artigos = artigo::all();
        return view('artigo.index', compact('artigos'));
    }

    public function categoria($id)
    {
        $artigos = Artigo::where('categoria_id', $id)->get();
        $categorias = Categoria::all();
        return view('artigo.categoria', compact('artigos', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('artigo.create', compact('categorias'));
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
        $artigo = Artigo::create($validateData);

        return redirect('/artigo')->with('success', 'Artigo criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artigo  $artigo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artigo = Artigo::findOrFail($id);
        $categorias = Categoria::all();
        return view('artigo.show', compact('artigo', 'categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artigo  $artigo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artigo = Artigo::findOrFail($id);
        $categorias = Categoria::all();
        return view('artigo.edit', compact('artigo', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artigo  $artigo
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
        Artigo::whereId($id)->update($validateData);

        return redirect('/artigo')->with('success', 'Artigo alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artigo  $artigo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artigo = Artigo::findOrFail($id);
        $artigo->delete();

        return redirect('/artigo')->with('success', 'Artigo removida com sucesso!');
    }
}
