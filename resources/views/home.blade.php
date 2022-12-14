@extends('layouts.app')

@section('content')

@auth
    @foreach($banners as $banner)  
                <div class="banner-area">
                    <img src="{{ asset('storage/uploads/banner/'.$banner->size) }}" />
                </div>              
     @endforeach
@endauth
<div class="container">
@auth       
    <div class="card content-home">
        <div class="card-body">            
            <h2>Notícias Recentes</h2>              
            @foreach($noticias as $noticia) 
            
                 @if($loop->index < 4)                       
                <div class="news-area">              
                    <h3><a href="{{ route('noticia.show',$noticia->id)}}" class="btn-title">{{$noticia->titulo}}</a></h3> 
                    
                    <?php
                    $limitNewsChar = "{$noticia->texto}";
                    echo mb_strimwidth($limitNewsChar, 0, 480, "...");
                    ?>   

                </div>  
                @endif                        
            @endforeach 
            <div><a class="btn btn-primary" href="{{ url('/news') }}">Ver todos</a></div>
        </div>  
    </div>

    <div class="card content-home">
        <div class="card-body">
            <div class="anuncio-area">
            @foreach($anuncios as $anuncio)
                    <img src="{{ asset('storage/uploads/anuncio/'.$anuncio->size) }}" width="300" height="40" />                             
            @endforeach
            </div> 
        </div>
    </div>
    
    <div class="card content-home">
        <div class="card-body">
            <h2>Artigos Recentes</h2>
            @foreach($artigos as $artigo)  
                <div class="news-area">              
                    <h3><a href="{{ route('artigo.show',$artigo->id)}}" class="btn-title">{{$artigo->titulo}}</a></h3>
                    
                    <?php
                    $limitArtigoChar = "{$artigo->texto}";
                    echo mb_strimwidth($limitArtigoChar, 0, 480, "...");
                    ?>   

                </div>              
            @endforeach
            <div><a class="btn btn-primary" href="{{ url('/articles') }}">Ver todos</a></div>
        </div>
    </div>
@endauth
</div>
@endsection