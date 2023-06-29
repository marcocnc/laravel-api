@extends('layouts.app')

@section('content')
    <div class="container pt-5">
        <table class="table">
            <thead>

              <tr>
                <th scope="col">
                    <a class="text-black text-decoration-none"
                    href="{{route('admin.orderby', ['direction' => $direction]) }}">ID</a>
                </th>
                <th scope="col">Name</th>
                <th scope="col">Tipo di progetto</th>
                <th scope="col">Technologie usate</th>
                <th scope="col">Start</th>
                <th scope="col">End</th>
                <th scope="col">Dettagli</th>
                <th scope="col">Modifica</th>
                <th scope="col">Elimina</th>
              </tr>

            </thead>

            <tbody>

              @foreach ($posts as $post)
                <tr>
                    <td>{{$post['id']}}</td>
                    <td>{{$post['name']}}</td>
                    <td><span class="badge text-bg-success">{{$post->type?->name}}</span></td>
                    <td>
                        @forelse ($post->technologies as $tech)
                            {{$tech->name}}
                        @empty
                            - Non sono presenti tag
                        @endforelse
                    </td>
                    @php
                        $start_date = date_create($post->start);
                        $end_date = date_create($post->end);
                    @endphp
                    <td>{{date_format($start_date, 'd/m/Y')}}</td>
                    <td>{{date_format($end_date, 'd/m/Y')}}</td>
                    <td>
                        <a class="btn btn-info" href="{{route('admin.posts.show', $post)}}"><i class="fa-solid fa-arrow-right"></i></a>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{route('admin.posts.edit', $post)}}"><i class="fa-solid fa-pencil"></i></a>

                    </td>
                    <td>
                        @include('admin.partials.form-delete')
                    </td>
                    {{-- <td>
                        <form action="{{route('admin.posts.destroy', $post)}}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare {{$post->name}}?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" title="delete" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td> --}}
                </tr>
              @endforeach

            </tbody>
          </table>

          <div>
            {{$posts->links()}}
          </div>
    </div>
@endsection
