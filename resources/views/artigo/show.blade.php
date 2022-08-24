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
    Motrar Artigo
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
       
            <h1>{{$artigo->titulo}}</h1>
            <p>{{$artigo->texto}}</p>
            <p>{{$artigo->data}}</p>

            <a href="{{ url('/home') }}" class="btn btn-primary">Voltar</a>      
  </div>
</div>
@endsection
</div>