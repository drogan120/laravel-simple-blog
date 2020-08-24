<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        // dd($posts);
        return view('post.index', compact('posts'));
    }
    public function create()
    {
        $categories =  \App\Models\Category::all();
        return view('post.new', compact('categories'));
    }

    public function store(PostRequest $postRequest)
    {
        $data = [
            'category_id' => $postRequest->category,
            'title' => $postRequest->title,
            'slug'  => Str::slug($postRequest->title),
            'content'  => $postRequest->content,
        ];
        Post::create($data);
        return redirect('/post/create')->with('success', 'Post has been created');
    }
}
