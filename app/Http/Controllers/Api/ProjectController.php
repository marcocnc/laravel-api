<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class ProjectController extends Controller
{
    public function index(){

        $posts = Post::all();
        return response()->json($posts);
    }
}


