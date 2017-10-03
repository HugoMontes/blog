<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Carbon\Carbon;

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

}
