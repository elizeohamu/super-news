@extends('layouts.app')

@section('content')

<div class="container">    
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Permissões</h4>
            </div>

            <div class="card-body">
                <a href="{{ route('permissions.create') }}" class="btn btn-primary">Adicionar Permissões</a>               

                <div class="mt-2">
                    @include('layouts.partials.messages')
                </div>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col" width="15%">Nome</th>
                        <th scope="col">Guard</th> 
                        <th scope="col" colspan="3" width="1%"></th> 
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                                <td><a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary">Editar</a></td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Deletar', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            <div>
        </div>
    </div>
</div>
@endsection
