<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;

class ArticlesController extends Controller
{
    public function create()
    {
        $categories = Category::orderBy('name')->pluck('name', 'id');
        $tags = Tag::orderBy('name')->pluck('name', 'id');

        return view('admin.articles.create')
            ->with('categories', $categories)
            ->with('tags', $tags);
    }

    public function store(Request $request)
    {
        // manipulacion de imágenes
        $file = $request->file('image');
        $name = 'img_' . time() . '.' .  $file->getClientOriginalExtension();
        $path = public_path() . '/images/articles/';
        $file->move($path, $name);
    }
}
