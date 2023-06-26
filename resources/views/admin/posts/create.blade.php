@extends('layouts.app')

@section('content')
    <div class="container pt-5">
        <h1 class="text-center">Create</h1>

        @if ($errors->any())

            <div class="alert alert-danger" role="alert">

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>


            </div>

        @endif


        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text"
                class="form-control w-75 @error('name')
                    is-invalid
                @enderror"
                id="name"
                name="name"
                placeholder="Inserisci nome">

                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="type_id">Tipo di progetto</label>
                <select class="form-select w-25" name="type_id" id="type_id">
                    <option value="" selected>Seleziona il tipo di progetto</option>
                    @foreach ($types as $type)
                        <option value="{{$type->id}}" @if($type->id == old('type_id')) selected @endif>{{$type->name}}</option>

                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Immagine</label>
                <input type="file"
                class="form-control w-75 mb-2"
                id="image"
                name="image"
                onchange="showImage(event)"
                >
                <img id="image-preview" src="" alt="" width="150">
            </div>

            <div class="mb-3">
                <p>Tecnologie usate</p>
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    @foreach ($technologies as $technology)
                        <input
                        type="radio"
                        class="btn-check"
                        name="technologies[]"
                        id="tech{{$loop->iteration}}"
                        autocomplete="off"
                        value="{{$technology->id}}"

                        @if (!$errors->any() && $technologies->contains($technology))
                            checked
                        @elseif ($errors->any() && in_array($technology->id, old('technologies', [])))
                            checked
                        @endif

                        >
                        <label class="btn btn-outline-primary" for="tech{{$loop->iteration}}">{{$technology->name}}</label>
                    @endforeach
            </div>

            <div class="mb-3">
                <label class="form-label">Descrizione</label>
                <textarea
                type="text"
                class="form-control w-75 @error('description')
                    is-invalid
                @enderror"
                id="description"
                name="description"
                placeholder="Inserisci le tecnologie usate"> </textarea>

                @error('description')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Data inizio</label>
                <input
                type="date"
                class="form-control w-25 @error('start')
                    is-invalid
                @enderror"
                id="start"
                name="start">

                @error('start')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Data fine</label>
                <input
                type="date"
                class="form-control w-25"
                id="end"
                name="end">
            </div>

            <button type="submit" class="btn btn-primary">Invia</button>
        </form>
    </div>
@endsection

<script>

    function showImage(event){
        const tagImage = document.getElementById('image-preview');
        tagImage.src = URL.createObjectURL(event.target.files[0]);
    }

</script>
