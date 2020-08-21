<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::paginate(2);
        return view('category.index', compact('category'));
    }
}
