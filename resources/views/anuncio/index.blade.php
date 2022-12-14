<!-- index.blade.php -->

@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif


<div class="container">

<div class="col-md-12">
          <div class="row justify-content-end mb-1">
             <div class="col-sm-12 float-right">
                @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-dismissible p-2">
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <strong>Success!</strong> {!! session('flash_message_success')!!}.
                </div>
                @endif
             </div>
          </div>
          <div class="card">
             <div class="card-header card-header-primary">
                <h4 class="card-title ">Lista de Anúncios</h4>
             </div>
             <div class="card-body">
                <div class="table-responsive">
                   <table class="table">
                      <thead class=" text-primary">
                         <th>
                            Category Name
                         </th>
                         <th>
                            Category Anuncio
                         </th>
                         <th>
                            Created At
                         </th>
                         <th>Editar</th>
                         <th>Deletar</th>
                      </thead>
                      <tbody>
                         @foreach($anuncio as $cat)
                         <tr>
                            <td>
                               {{ $cat->descricao }}
                            </td>
                            @if(empty($cat->size))
                            <td>
                               <h6>No Image Found !</h6>
                            </td>
                            @else
                            <td>
                               <a href="{{ asset('storage/uploads/anuncio/'.$cat->size) }}" target="_blank" title="view category Anuncio">
                               <img src="{{ asset('storage/uploads/anuncio/'.$cat->size) }}" width="110" height="40" /> </a>
                            </td>
                            @endif
                            <td class="text-primary">
                               {{  date('j \\ F Y', strtotime($cat->created_at)) }}
                            </td>
                            <td>
                            <a href="anuncio/{{$cat->id}}/edit" class="btn btn-primary">Editar</a>
                          </td>
                          <td>
                              <form action="{{ route('anuncio.destroy', $cat->id) }}" method="post">
                                 @csrf
                                 @method('DELETE')
                                 <button class="btn btn-danger" type="submit">Remover</button>                  
                              </form>
                           </td>
                         </tr>
                         @endforeach
                      </tbody>
                   </table>
                </div>
             </div>
          </div>
       </div>   
       
       <a href="{{ route('anuncio.create')}}" class="btn btn-primary">Adicionar novo Anuncio</a>
     </div>     
@endsection
</div>