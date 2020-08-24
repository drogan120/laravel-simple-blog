<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use Illuminate\Support\Str;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tag.index', compact('tags'));
    }

    public function store(TagRequest $tagRequest)
    {
        $data = [
            'name' => $tagRequest->name,
            'slug' => Str::slug($tagRequest->name)
        ];

        Tag::create($data);
        return redirect('/tag')->with('success', 'Data has been added');
    }

    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tag.edit', compact('tag'));
    }

    public function update(TagRequest $tagRequest, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update(['name' => $tagRequest->name]);
        return redirect('/tag')->with('success', 'Data has been updated');
    }

    public function destroy($id)
    {
        Tag::findOrFail($id)->delete();
        return redirect('/tag')->with('success', 'Data has been deleted');
    }
}
