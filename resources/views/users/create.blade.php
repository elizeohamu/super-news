@extends('layouts.app')

@section('content')

<div class="container">    
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Adicionar Novo Usuário</h4>
            </div>

            <div class="card-body">

                <div class="container mt-4">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input value="{{ old('name') }}" 
                                type="text" 
                                class="form-control" 
                                name="name" 
                                placeholder="Nome" required>

                            @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input value="{{ old('email') }}"
                                type="email" 
                                class="form-control" 
                                name="email" 
                                placeholder="Endereço de E-mail" required>
                            @if ($errors->has('email'))
                                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input value="{{ old('username') }}"
                                type="text" 
                                class="form-control" 
                                name="username" 
                                placeholder="Username" required>
                            @if ($errors->has('username'))
                                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar Usuário</button>
                        <a href="{{ route('users') }}" class="btn btn-secondary">Voltar</a>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
