<!-- create.blade.php -->

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
            <h4 class="card-title ">Adicionar Artigo</h4>
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
              <form method="post" action="{{ route('artigo.store') }}">
                  <div class="form-group">
                      @csrf
                      <label for="titulo">Título:</label>
                      <input type="text" class="form-control" name="titulo"/>
                  </div> 
                  <br />
                  <div class="form-group">
                      <label for="texto">Texto:</label>
                      <textarea type="text" class="form-control" name="texto"></textarea>
                  </div>  
                  <br /> 
                  <div class="form-group">
                      <label for="data">Data:</label>
                      <input type="date" class="form-control" name="data"/>
                  </div>
                  <br />
                  <div class="form-group">
                      <label for="categoria_id">Categoria:</label>
                      <select class="form-control" name="categoria_id" >
                      @foreach($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->descricao}}</option>
                      @endforeach
                      </select>
                  </div>   
                  <br />
                  <button type="submit" class="btn btn-primary">Adicionar</button>
                  <a href="{{ route('artigo') }}" class="btn btn-secondary">Voltar</a>
              </form>
          </div>

     </div>
@endsection
  </div>
</div>