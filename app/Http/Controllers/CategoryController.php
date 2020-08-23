<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::paginate(10);
        return view('category.index', compact('category'));
    }

    public function store(CategoryRequest $categoryRequest)
    {
        $data = [
            'name' => $categoryRequest->name,
            'slug' => Str::slug($categoryRequest->name)
        ];
        Category::create($data);
        return redirect('/category')->with('success', 'Data has been added');
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    public function update(CategoryRequest $categoryRequest, $id)
    {
        $category =  Category::find($id);
        $category->update(['name' => $categoryRequest->name]);
        return redirect('/category')->with('success', 'data has been updated');
    }
}
