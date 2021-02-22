@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
@endsection

@section('hero')
    <div class="hero-categorias">
        <form action="{{ route('buscar.show') }}" class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-md-4 texto-buscar">
                    <p class="display-4">Encuentra una receta para tu proxima comida</p>
                    <input type="search" name="buscar" id="" class="form-control" placeholder="Buscar Receta">
                </div>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="container nuevas-recetas">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Últimas Recetas</h2>
        <div class="owl-carousel owl-theme">
            @foreach ($recetas as $receta)
                <div class="card">
                    <img src="/storage/{{ $receta->imagen }}" class="card-img-top" alt="imagen receta ">
                    <div class="card-body">
                        <h3>{{ Str::title( $receta->titulo ) }}</h3>
                        <p>{{ Str::words( strip_tags($receta->preparacion), 20 ) }}</p>
                        <a href="{{ route('recetas.show', $receta->id) }}" class="btn btn-primary d-block font-weigth-bold text-uppercase btn-receta">Ver receta</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Recetas mas Gustadas</h2>
        <div class="row">
            @foreach ($gustadas as $receta)
                @include('ui.recetas')
            @endforeach
        </div>
    </div>

    @foreach ($recetas_categorias as $key => $grupo)
        <div class="container">
            <h2 class="titulo-categoria text-uppercase mt-5 mb-4">{{ str_replace('-', ' ', $key) }}</h2>
            <div class="row">
                @foreach ($grupo as $receta_categoria)
                    @foreach ($receta_categoria as $receta)
                        @include('ui.recetas')
                    @endforeach
                @endforeach
            </div>
        </div>
    @endforeach
@endsection
