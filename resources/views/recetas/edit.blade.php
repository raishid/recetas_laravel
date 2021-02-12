@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA==" crossorigin="anonymous" />
@endsection

@section('botones')
    <a href="{{ route('recetas.index') }}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold">
        <svg class="w-6 h-6 icono1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg>
        Volver
    </a>
@endsection

@section('content')
    <h2 class="text-center mb-5">Editar Receta</h2>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form action="{{ route('receta.update', $receta->id) }}" enctype="multipart/form-data" method="post" novalidate>
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="titulo">Titulo Receta</label>
                    <input type="text" name="titulo" id="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ $receta->titulo }}" placeholder="Titulo Receta">
                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="categorias">Categorias</label>
                    <select name="categoria" id="categoria_receta" class="form-control @error('categoria') is-invalid @enderror">
                        <option value="" selected="selected">-Selecciona la categoria de receta</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $receta->categoria_id == $categoria->id ? 'selected': '' }}>{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="preparacion">Preparacion</label>
                    <input type="hidden" name="preparacion" id="preparacion" value="{{ $receta->preparacion }}">

                    <trix-editor class="form-control @error('preparacion') is-invalid @enderror" input="preparacion"></trix-editor>

                    @error('preparacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="form-group mt-3">
                    <label for="ingredientes">Ingredientes</label>
                    <input type="hidden" name="ingredientes" id="ingredientes" value="{{ $receta->ingredientes }}">

                    <trix-editor class="form-control @error('ingredientes') is-invalid @enderror" input="ingredientes"></trix-editor>

                    @error('ingredientes')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group mt-3">
                    <label for="imagen">Elige la imagen</label>
                    <input type="file" name="imagen" id="imagen" value="{{ old('imagen') }}" class="form-control @error('imagen') is-invalid @enderror">
                    <div class="mt-4">
                        <p>Imagen actual:</p>
                        <img src="/storage/{{ $receta->imagen }}" style="width: 300px">
                    </div>
                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Editar Receta">
                </div>
            </form>
        </div>
    </div>

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix-core.min.js" integrity="sha512-lyT4F0/BxdpY5Rn1EcTA/4OTTGjvJT9SxWGxC1boH9p8TI6MzNexLxEuIe+K/pYoMMcLZTSICA/d3y0ColgiKg==" crossorigin="anonymous" defer></script>
@endsection

@endsection
