<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Carbon\Carbon;
use App\Category;
use App\Tag;

class FrontController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('es');
    }

    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(3);

        return view('front.index')->with('articles', $articles);
    }

    public function searchCategory(Category $category)
    {
        $articles = $category->articles()->paginate(3);

        return view('front.index')->with('articles', $articles);
    }

    public function searchTag(Tag $tag)
    {
        $articles = $tag->articles()->paginate(3);

        return view('front.index')->with('articles', $articles);
    }
}
