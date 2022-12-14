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

  <table class="table table-striped">
    <thead>
        <tr>
          <td>Código</td>
          <td>Título</td>
          <td>Texto</td>
          <td>Data</td>          
        </tr>
    </thead>
    <tbody>
        @foreach($noticias as $noticia)
        <tr>
            <td>{{$noticia->id}}</td>
            <td>{{$noticia->titulo}}</td>
            <td>{{$noticia->texto}}</td> 
            <td>{{$noticia->data}}</td>                       
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
</div>