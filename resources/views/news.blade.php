@extends('layouts.app')

@section('content')

<div class="container">
@auth       
    <div class="card content-home">
        <div class="card-body">            
            <h2>Notícias Recentes</h2>
            @foreach($noticias as $noticia) 
                <div class="news-area">              
                    <h3><a href="{{ route('noticia.show',$noticia->id)}}" class="btn-title">{{$noticia->titulo}}</a></h3> 
                    
                    <?php
                    $limitNewsChar = "{$noticia->texto}";
                    echo mb_strimwidth($limitNewsChar, 0, 480, "...");
                    ?>                    
                        
                </div>                          
            @endforeach             
        </div>  
    </div>   
   
@endauth
</div>
@endsection