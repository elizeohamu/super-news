@extends('layouts.app')

@section('content')
<div class="container">    
    <div class="col-md-12">
        <div class="card">
            
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Adicionar Novo Papel</h4>
            </div>

            <div class="card-body">

                <div class="container mt-4">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('roles.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input value="{{ old('name') }}" 
                            type="text" 
                            class="form-control" 
                            name="name" 
                            placeholder="Nome" required>
                    </div>

                    <label for="permissions" class="form-label">Assign Permissions</label>

                    <table class="table table-striped">
                        <thead>
                            <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                            <th scope="col" width="20%">Nome</th>
                            <th scope="col" width="1%">Guard</th> 
                        </thead>

                        @foreach($permissions as $permission)
                            <tr>
                                <td>
                                    <input type="checkbox" 
                                    name="permission[{{ $permission->name }}]"
                                    value="{{ $permission->name }}"
                                    class='permission'>
                                </td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                            </tr>
                        @endforeach
                    </table>

                    <button type="submit" class="btn btn-primary">Salvar Usuário</button>
                    <a href="{{ route('roles') }}" class="btn btn-secondary">Voltar</a>
                </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('[name="all_permission"]').on('click', function() {

                if($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked',false);
                    });
                }

            });
        });
    </script>
@endsection
