@extends('layouts.app')

@section('content')

<div class="container">    
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Usuários</h4>
            </div>

            <div class="card-body">        
       
                <a href="{{ route('users.create') }}" class="btn btn-primary" style="display: none;">Adicionar Novo Usuário</a>

                <div class="mt-2">
                @include('layouts.partials.messages')
                </div>

                <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col" width="1%">#</th>
                    <th scope="col" width="15%">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col" width="10%">Username</th>
                    <th scope="col" width="10%">Papéis</th>
                    <th scope="col" width="1%" colspan="3"></th>    
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                                @foreach($user->roles as $role)
                                    <span class="badge bg-primary">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td><a href="{{ route('users.show', $user->id) }}" class="btn btn-warning">Mostrar</a></td>
                            <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Editar</a></td>
                            <td>
                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Deletar', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>

                <div class="d-flex">
                {!! $users->links() !!}
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
