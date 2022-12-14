@extends('layouts.app')

@section('content')
<div class="container">    
    <div class="col-md-12">
        <div class="card">
       
             <div class="card-header card-header-primary">
                <h4 class="card-title ">Adicionar Permissão</h4>
            </div>
           
            <div class="card-body">
                <div class="container mt-4">

                    <form method="POST" action="{{ route('permissions.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input value="{{ old('name') }}" 
                                type="text" 
                                class="form-control" 
                                name="name" 
                                placeholder="Name" required>

                            @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar Permissão</button>
                        <a href="{{ route('permissions') }}" class="btn btn-secondary">Voltar</a>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
