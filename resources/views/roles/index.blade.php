@extends('layouts.app')

@section('content')

    

<div class="container">    
    <div class="col-md-12">
        <div class="card">

            <div class="card-header card-header-primary">
                <h4 class="card-title ">Papéis</h4>
            </div>

            <div class="card-body"> 
        
                <a href="{{ route('roles.create') }}" class="btn btn-primary">Adicionar Papel</a>

                <div class="mt-2">
                    @include('layouts.partials.messages')
                </div>

                <table class="table table-bordered">
                    <tr>
                        <th width="1%">Nº</th>
                        <th>Nome</th>
                        <th width="3%" colspan="3">Ação</th>
                    </tr>
                    @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">Mostrar</a>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Editar</a>
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </table>

                <div class="d-flex">
                    {!! $roles->links() !!}
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
