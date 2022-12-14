<!-- index.blade.php -->

@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif  

  <div class="container">    
    <div class="col-md-12">
        <div class="card">

        <div class="card-header card-header-primary">
          <h4 class="card-title ">Notícias</h4>
        </div>

        <div class="card-body">

          <a href="{{ route('noticia.create')}}" class="btn btn-primary">Adicionar nova notícia</a><br /><br />

          <table class="table table-striped">
            <thead>
                <tr>
                  <td>Código</td>
                  <td>Título</td>
                  <td>Texto</td>
                  <td>Data</td>
                  <td colspan="2"></td>
                </tr>
            </thead>
            <tbody>
                @foreach($noticias as $noticia)
                <tr>
                    <td>{{$noticia->id}}</td>
                    <td>{{$noticia->titulo}}</td>
                    <td>
                      <?php
                        $limitNewsChar = "{$noticia->texto}";
                        echo mb_strimwidth($limitNewsChar, 0, 480, "...");
                      ?> 
                    </td>
                    <td>{{$noticia->data}}</td>            
                    <td><a href="{{ route('noticia.edit',$noticia->id)}}" class="btn btn-primary">Editar</a></td>
                    <td>
                        <form action="{{ route('noticia.destroy', $noticia->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Remover</button>                  
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>

    </div>
  
    </div>
@endsection
  </div>
</div>