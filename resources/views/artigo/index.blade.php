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
    <a href="{{ route('artigo.create')}}" class="btn btn-primary">Adicionar novo artigo</a>
  <br /> <br />


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
        @foreach($artigos as $artigo)
        <tr>
            <td>{{$artigo->id}}</td>
            <td>{{$artigo->titulo}}</td>
            <td>{{$artigo->texto}}</td>
            <td>{{$artigo->data}}</td>            
            <td><a href="{{ route('artigo.edit',$artigo->id) }}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('artigo.destroy', $artigo->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Remover</button>                  
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
</div>