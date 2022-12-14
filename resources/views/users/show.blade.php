@extends('layouts.app')

@section('content')
<div class="container">    
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Mostrar Usuário</h4>
            </div>

            <div class="card-body">

                <div class="container mt-4">
                    <div>
                        Nome: {{ $user->name }}
                    </div>
                    <div>
                        Email: {{ $user->email }}
                    </div>
                    <div>
                        Username: {{ $user->username }}
                    </div>
                </div>
                
                <div class="mt-4">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Editar</a>
                    <a href="{{ route('users') }}" class="btn btn-secondary">Voltar</a>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
