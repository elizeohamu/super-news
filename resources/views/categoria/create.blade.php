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
          <h4 class="card-title ">Adicionar Categoria</h4>
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
            <form method="post" action="{{ route('categoria.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Descrição:</label>
                    <input type="text" class="form-control" name="descricao"/>
                </div>         
                <br /> 
                <button type="submit" class="btn btn-primary">Adicionar</button>
                <a href="{{ route('categoria') }}" class="btn btn-secondary">Voltar</a>
            </form>
        </div>

    </div>
@endsection
  </div>
</div>