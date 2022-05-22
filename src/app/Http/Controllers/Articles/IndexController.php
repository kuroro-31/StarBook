<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;

class IndexController extends Controller
{
    /**
     * トップページ
     */
    public function __invoke()
    {
        $articles = Article::orderBy('created_at')->paginate(10)
        ->load(['user', 'likes', 'tags']);
        return view('articles.index', compact('articles'));
    }
}