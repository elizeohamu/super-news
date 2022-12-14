@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header card-header-primary">
                <h4 class="card-title ">Papel: <strong>{{ ucfirst($role->name) }}</strong></h4>
            </div>      

            <div class="card-body">
                <div class="container mt-4">

                    <h3>Assigned permissions</h3>

                    <table class="table table-striped">
                        <thead>
                            <th scope="col" width="20%">Nome</th>
                            <th scope="col" width="1%">Guard</th> 
                        </thead>

                        @foreach($rolePermissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <div class="mt-4">
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary">Editar</a>
                    <a href="{{ route('roles') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
