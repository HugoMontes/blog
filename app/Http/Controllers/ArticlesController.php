<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Article;
use App\Image;

class ArticlesController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::search($request->title)->orderBy('id', 'DESC')->paginate(5);

        $articles->each(function($articles) {
            $articles->category;
            $articles->user;
        });

        return view('admin.articles.index')->with('articles', $articles);
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
        $request->validate([
            'title' => 'min:8|max:250|required|unique:articles',
            'category_id' => 'required',
            'content' => 'min:60|required',
            'image' => 'required|image|mimes:jpeg,png|max:30',
        ]);

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

    public function edit(Article $article)
    {
        $categories = Category::orderBy('name', 'DESC')->pluck('name', 'id');
        $tags = Tag::orderBy('name', 'DESC')->pluck('name', 'id');
        $tagsOriginal = $article->tags->pluck('id')->ToArray();

        return view('admin.articles.edit')
            ->with('categories', $categories)
            ->with('tags', $tags)
            ->with('tagsOriginal', $tagsOriginal)
            ->with('article', $article);
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'min:8|max:250|required|unique:articles',
            'category_id' => 'required',
            'content' => 'min:60|required',
        ]);

        $article->fill($request->all());
        $article->save();

        $article->tags()->sync($request->tags);

        flash("El artículo se actualizó con éxito.")->success()->important();

        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        flash("El Artículo '$article->title' ha sido eliminado con éxito.")->success()->important();

        return redirect()->route('articles.index');
    }
}
