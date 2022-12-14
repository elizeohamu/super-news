@extends('layouts.app')

@section('content')

<div class="container">
@auth       
    <div class="card content-home">
        <div class="card-body">            
            <h2>Notícias Recentes</h2>
            @foreach($artigos as $artigo) 
                <div class="news-area">              
                    <h3><a href="{{ route('artigo.show',$artigo->id)}}" class="btn-title">{{$artigo->titulo}}</a></h3> 
                    
                    <?php
                    $limitNewsChar = "{$artigo->texto}";
                    echo mb_strimwidth($limitNewsChar, 0, 480, "...");
                    ?>                    
                        
                </div>                          
            @endforeach             
        </div>  
    </div> 
@endauth
</div>
@endsection