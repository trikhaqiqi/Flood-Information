<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function post()
    {
        $query = request('query');
        $posts = Post::where("title", "like", "%$query%")->latest()->paginate();
        return view('posts.index', compact('posts'));
    }
}
