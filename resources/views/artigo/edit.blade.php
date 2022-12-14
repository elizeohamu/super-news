<!-- edit.blade.php -->

@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="container">    
    <div class="col-md-12">
        <div class="card">

          <div class="card-header card-header-primary">
            <h4 class="card-title ">Editar artigo</h4>
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
              <form method="post" action="{{ route('artigo.update', $artigo->id) }}">
                  <div class="form-group">
                      @csrf
                      @method('PATCH')
                      <label for="titulo">Título:</label>
                      <input type="text" class="form-control" name="titulo" value="{{$artigo->titulo}}"/>
                  </div>
                  <br />
                  <div class="form-group">
                      <label for="texto">Texto:</label>
                      <textarea type="text" class="form-control" name="texto">{{$artigo->texto}}</textarea>
                  </div> 
                  <br />
                  <div class="form-group">
                      <label for="data">Data:</label>
                      <input type="datetime" class="form-control" name="data" value="{{$artigo->data}}"/>
                  </div>    
                  <br />
                  <div class="form-group">
                      <label for="categoria_id">Categoria :</label>
                      <select class="form-control" name="categoria_id" value="{{$artigo->categoria_id}}" >
                      @foreach($categorias as $categoria)
                        <option value="{{$categoria->id}}" 
                        <?php if($categoria->id == $artigo->categoria_id)  echo "selected"; ?>
                        > {{$categoria->descricao}}</option>
                      @endforeach
                      </select>
                  </div>  
                  <br />
                  <button type="submit" class="btn btn-primary">Salvar</button>
                  <a href="{{ route('artigo') }}" class="btn btn-secondary">Voltar</a>
              </form>
          </div>

    </div>
@endsection
  </div>
</div>