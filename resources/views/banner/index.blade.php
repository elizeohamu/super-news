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
                <h4 class="card-title ">Banner</h4>
             </div>
             <div class="card-body">
                <div class="table-responsive">
                   <table class="table">
                      <thead>
                         <th>
                            Nome da Categoria
                         </th>
                         <th>
                            Categoria do Banner
                         </th>
                         <th>
                            Criado em
                         </th>
                         <th>Editar</th>
                         <th>Deletar</th>
                      </thead>
                      <tbody>
                         @foreach($banner as $cat)
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
                               <a href="{{ asset('storage/uploads/banner/'.$cat->size) }}" target="_blank" title="view category Banner">
                               <img src="{{ asset('storage/uploads/banner/'.$cat->size) }}" width="110" height="40" /> </a>
                            </td>
                            @endif
                            <td class="text-primary">
                               {{  date('j \\ F Y', strtotime($cat->created_at)) }}
                            </td>
                            <td>
                            <a href="banner/{{$cat->id}}/edit" class="btn btn-primary">Editar</a>
                          </td>
                          <td>
                              <form action="{{ route('banner.destroy', $cat->id) }}" method="post">
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
      
       @if($banner->isEmpty())
       <a href="{{ route('banner.create')}}" class="btn btn-primary">Adicionar novo Banner</a>
            @else
            <p></p>
       @endif
       
     </div>     
@endsection
</div>