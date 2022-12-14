<!-- index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Carregar</h4>
              <p class="card-category">Complete your Categories</p>
            </div>
            <div class="card-body">
              <form action="{{route('banner.store')}}" method="POST" id="banner" name="banner_index" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nome do Banner</label>
                      <input type="text" class="form-control" name="descricao">
                      @if ($errors->has('descricao'))
                      <span class="errormsg text-danger">{{ $errors->first('descricao') }} </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group is-focused file-input">
                      <label class="bmd-label-floating">Categoria do Banner</label>
                      <input type="file" name="banner_img" class="form-control" accept="image">
                    </div>
                    @if ($errors->has('banner_img'))
                    <span class="errormsg text-danger">{{ $errors->first('banner_img') }} </span>
                    @endif
                  </div>
                </div>
                <br />
                <button type="submit" class="btn btn-primary pull-left">Salvar</button>
                <a href="{{ route('banner') }}" class="btn btn-secondary">Voltar</a>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>         

    </div>
@endsection
</div>