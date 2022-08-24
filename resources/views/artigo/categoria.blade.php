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
        @foreach($artigos as $artigo)
        <tr>
            <td>{{$artigo->id}}</td>
            <td>{{$artigo->titulo}}</td>
            <td>{{$artigo->texto}}</td> 
            <td>{{$artigo->data}}</td>                       
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
</div>