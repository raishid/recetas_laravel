@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                @if ($perfil->imagen)
                    <img src="/storage/{{ $perfil->imagen }}" class="w-100 rounded-circle" alt="imagen chef">
                @endif
            </div>
            <div class="col-md-7 mt-5 mt-md-0">
                @php
                    $nombre = ucfirst($perfil->user->name)
                @endphp
                <h2 class="text-center mb-2 text-primary">{{ $nombre }}</h2>
                <a href="{{ $perfil->user->url }}">Visitar Sitio Web</a>
                <div class="biografia">
                    {!! $perfil->biografia !!}
                </div>
            </div>
        </div>
    </div>
@endsection