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
        $tags = \App\Models\Tag::all();
        return view('post.new', compact('categories', 'tags'));
    }

    public function store(PostRequest $postRequest)
    {


        $thumb =  $postRequest->thumbnail;
        if (!empty($thumb)) {
            $thumbnail = time() . $thumb->getClientOriginalName();

            $data = [
                'category_id' => $postRequest->category,
                'title' => $postRequest->title,
                'slug'  => Str::slug($postRequest->title),
                'content'  => $postRequest->content,
                'thumbnail'  => 'uploads/posts/' . $thumbnail,
            ];
            $thumb->move('uploads/posts/', $thumbnail);

            $post = Post::create($data);
            $post->tag()->attach($postRequest->tags);
        }

        $data = [
            'category_id' => $postRequest->category,
            'title' => $postRequest->title,
            'slug'  => Str::slug($postRequest->title),
            'content'  => $postRequest->content,
        ];

        $post = Post::create($data);
        $post->tag()->attach($postRequest->tags);
        return redirect('/post/create')->with('success', 'Post has been created');
    }

    public function show($id)
    {
        $post  =  Post::findOrFail($id);
        $categories = \App\Models\Category::all();
        return view('post.edit', compact('post', 'categories'));
    }

    public function update(PostRequest $postRequest, $id)
    {
        $thumb =  $postRequest->thumbnail;

        if (!empty($thumb)) {

            $thumbnail = time() . $thumb->getClientOriginalName();
            $data = [
                'title' => $postRequest->title,
                'category_id' => $postRequest->category,
                'content' => $postRequest->content,
                'thumbnail'  => 'uploads/posts/' . $thumbnail,
            ];
            $thumb->move('uploads/posts/', $thumbnail);
            $post = Post::find($id);
            $post->update($data);
        }
        $data = [
            'title' => $postRequest->title,
            'category_id' => $postRequest->category,
            'content' => $postRequest->content,
        ];

        $post = Post::find($id);
        $post->update($data);
        return redirect('/post')->with('success', 'post has been updated');
    }

    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect('/post')->with('success', 'post has been deleted');
    }
}
