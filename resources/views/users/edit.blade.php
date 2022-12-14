@extends('layouts.app')

@section('content')
<div class="container">    
    <div class="col-md-12">
        <div class="card">

            <div class="card-header card-header-primary">
                <h4 class="card-title ">Atualizar Usuário</h4>
            </div>

            <div class="card-body">


                <div class="container mt-4">
                <form method="post" action="{{ route('users.update', $user->id) }}">
                    @method('patch')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input value="{{ $user->name }}" 
                            type="text" 
                            class="form-control" 
                            name="name" 
                            placeholder="Name" required>

                        @if ($errors->has('name'))
                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input value="{{ $user->email }}"
                            type="email" 
                            class="form-control" 
                            name="email" 
                            placeholder="Email address" required>
                        @if ($errors->has('email'))
                            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input value="{{ $user->username }}"
                            type="text" 
                            class="form-control" 
                            name="username" 
                            placeholder="Username" required>
                        @if ($errors->has('username'))
                            <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Papel</label>
                        <select class="form-control" 
                            name="role" required>
                            <option value="">Selecionar Papel</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ in_array($role->name, $userRole) 
                                        ? 'selected'
                                        : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('role'))
                            <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Atualizar Usuário</button>
                    <a href="{{ route('users') }}" class="btn btn-secondary">Cancelar</a></button>
                </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection