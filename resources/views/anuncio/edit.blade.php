<!-- index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Editar</h4>
              <p class="card-category">Complete your Categories</p>
            </div>
            <div class="card-body">
              <form action="{{route('anuncio.update', $anuncio->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="img-area" >
                  <img src="{{ asset('storage/uploads/anuncio/'.$anuncio->size) }}" width="300px"> 
                </div>              
                              
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nome do Anúncio</label>
                      <input type="text" class="form-control" name="descricao" value="{{$anuncio->descricao}}">
                      @if ($errors->has('descricao'))
                      <span class="errormsg text-danger">{{ $errors->first('descricao') }} </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group is-focused file-input">
                      <label class="bmd-label-floating">Categoria do Anúncio</label>
                      <input type="file" name="anuncio_img" class="form-control" accept="image">
                    </div>
                    @if ($errors->has('anuncio_img'))
                    <span class="errormsg text-danger">{{ $errors->first('anuncio_img') }} </span>
                    @endif
                  </div> 

                </div>
                <br />
                <button type="submit" class="btn btn-primary pull-left">Salvar</button>
                <a href="{{ route('anuncio') }}" class="btn btn-secondary">Voltar</a>
                <div class="clearfix"></div>
              </form>
            </div>
          </div> 
    </div>
@endsection
</div>