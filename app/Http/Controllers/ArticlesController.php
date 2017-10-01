<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Article;
use App\Image;

class ArticlesController extends Controller
{
    public function index()
    {
        return view('admin.articles.index');
    }

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
        if ($request->file('image')) {
            $file = $request->file('image');
            $name = 'img_' . time() . '.' .  $file->getClientOriginalExtension();
            $path = public_path() . '/images/articles/';
            $file->move($path, $name);
        }

        $article = new Article($request->all());
        $article->user_id = \Auth::user()->id;
        $article->save();

        $article->tags()->sync($request->tags);

        $image = new Image();
        $image->name = $name;
        $image->article()->associate($article);
        $image->save();

        flash("El artículo '$article->title' ha sido creado con éxito.")->success()->important();

        return redirect()->route('articles.index');
    }
}
