<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $direction = 'asc';
        $posts = Post::orderBy('id', $direction)->paginate(10);
        return view('admin.posts.index', compact('posts', 'direction'));
    }

    public function orderby($direction){
        $direction = $direction === 'asc' ? 'desc' : 'asc';
        $posts = Post::orderBy('id', $direction)->paginate(10);
        return view('admin.posts.index', compact('posts', 'direction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $technologies = Technology::all();
        $types = Type::all();
        return view('admin.posts.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $form_data = $request->all();
        $form_data['slug'] = Post::generateSlug($form_data['name']);
        $form_data['start'] = date('Y-m-d');
        $form_data['end'] = date('Y-m-d');


        // Verificare se è stata caricata l'immagine
        if(array_key_exists('image', $form_data)){

            // Prima di salvare l'immagine salvo il nome
            $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();

            // Salvo l'immagine nella cartella uploads e in $form_data['image_path'] salvo il percorso
            $form_data['image_path'] = Storage::put('uploads', $form_data['image']);
        }

        $new_post = new Post();


        $new_post->fill($form_data);
        $new_post->save();
        return redirect()->route('admin.posts.show', $new_post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $types = Type::all();
        $date_start = date_create($post->start);
        $date_start_formatted =  date_format($date_start, 'd/m/Y');

        $date_end = date_create($post->end);
        $date_end_formatted =  date_format($date_end, 'd/m/Y');
        return view('admin.posts.show', compact('post', 'date_end_formatted', 'date_start_formatted', 'types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $technologies = Technology::all();
        $types = Type::all();
        return view('admin.posts.edit', compact('post', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $form_data = $request->all();
        $form_data['slug'] = Post::generateSlug($form_data['name']);

        // Verificare se è stata caricata l'immagine
        if(array_key_exists('image', $form_data)){

            // Prima di salvare l'immagine salvo il nome
            $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();

            // Salvo l'immagine nella cartella uploads e in $form_data['image_path'] salvo il percorso
            $form_data['image_path'] = Storage::put('uploads', $form_data['image']);
        }


        $post->update($form_data);

        return redirect()->route('admin.posts.show', compact('post'));;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('deleted', 'L\'elemento è stato rimosso');
    }
}
