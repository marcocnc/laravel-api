<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class ProjectController extends Controller
{
    public function index(){

        $posts = Post::with('type', 'technologies')->get();
        return response()->json($posts);
    }

    public function getPost($slug){
        $post = Post::where('slug', $slug)->with('type', 'technologies')->first();

        return response()->json($post);
    }
}


