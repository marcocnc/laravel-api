@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="title-buttons">
        <h1 class="text-primary">Nome</h1>
        <p class="fs-4">{{$post->name}}
            <a class="btn btn-warning" href="{{route('admin.posts.edit', $post)}}"><i class="fa-solid fa-pencil"></i></a>
            @include('admin.partials.form-delete')
        </p>

    </div>
    <h3 class="text-primary">Tipo di progetto</h3>
    <p class="badge text-bg-success">{{ $post->type?->name }}</p>
    <h3 class="text-primary">Immagine</h3>
    <img src="{{ asset('storage/' . $post->image_path) }}" alt="" width="500">

    <h3 class="text-primary">Descrizione</h3>
    <p class="w-75">{{$post->description}}</p>

    <h3 class="text-primary">Tecnologie usate</h3>
    <p class="w-75">{{$post->technologies}}</p>

    <h3 class="text-primary">Data inizio</h3>
    <p class="w-75">{{$date_start_formatted}}</p>

    <h3 class="text-primary">Data conclusione</h3>
    <p class="w-75">{{$date_end_formatted}}</p>

    <a href="{{route('admin.posts.index')}}" class="btn btn-primary">Torna al Portfolio <i class="fa-solid fa-right-to-bracket ps-1"></i></a>
</div>
@endsection
