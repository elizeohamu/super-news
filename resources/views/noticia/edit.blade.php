<!-- edit.blade.php -->

@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="container">

<div class="card uper">
  <div class="card-header">
    <h4 class="card-title ">Editar notícia</h4>    
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('noticia.update', $noticia->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="titulo">Título:</label>
              <input type="text" class="form-control" name="titulo" value="{{$noticia->titulo}}"/>
          </div>
          <br /> 
          <div class="form-group">
              <label for="texto">Texto:</label>
              <textarea type="text" class="form-control" name="texto">{{$noticia->texto}}</textarea>
          </div> 
          <br /> 
          <div class="form-group">
              <label for="data">Data:</label>
              <input type="datetime" class="form-control" name="data" value="{{$noticia->data}}"/>
          </div>          
          <br /> 
          <div class="form-group">
              <label for="categoria_id">Categoria:</label>
              <select class="form-control" name="categoria_id" value="{{$noticia->categoria_id}}" >
              @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}" 
                <?php if($categoria->id == $noticia->categoria_id)  echo "selected"; ?>
                > {{$categoria->descricao}}</option>
              @endforeach
              </select>
          </div><br /> 
          
          <button type="submit" class="btn btn-primary">Salvar</button>
          <a href="{{ route('noticia') }}" class="btn btn-secondary">Voltar</a>
      </form>
  </div>
</div>
@endsection
</div>