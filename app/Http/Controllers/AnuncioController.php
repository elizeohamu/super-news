<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use Illuminate\Http\Request;

class AnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anuncio = Anuncio::orderBy('descricao')->get();
        return view('anuncio.index', compact('anuncio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('anuncio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required',
            'anuncio_img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
         #Handle File Upload
         if($request->hasfile('anuncio_img'))
        {
            $name = $request->descricao . '.' . $request->anuncio_img->getClientOriginalExtension();
            $path = 'public/uploads/anuncio';
            $request->anuncio_img->storeAs($path, $name);
            $anuncio_img = $name;
        }else{
            $anuncio_img = null;
        }
            
        $cat = new Anuncio();
        $cat->descricao = $request->descricao;
        $cat->size = $anuncio_img;
        $cat->save();
        return redirect('/anuncio')->with('success','Anuncio added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function show(Anuncio $anuncio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $anuncio = Anuncio::findOrFail($id);        
        return view('anuncio.edit', compact('anuncio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'descricao' => 'required',
            'anuncio_img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        

        if($request->hasfile('anuncio_img'))
        {            
            $name = $request->descricao . '.' . $request->anuncio_img->getClientOriginalExtension();
            $path = 'public/uploads/anuncio';
            $request->anuncio_img->storeAs($path, $name);
            $anuncio_img = $name;            
            
        }else{
            $anuncio_img = null;
        }    
        $cat = Anuncio::findOrFail($id);
        $cat->descricao = $request->descricao;
        $cat->size = $anuncio_img;    

        $cat->update();

        return redirect('/anuncio')->with('success', 'Anuncio alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anuncio = Anuncio::findOrFail($id);
        $anuncio->delete();

        return redirect('/anuncio')->with('success', 'Anuncio removido com sucesso!');
    }
}
