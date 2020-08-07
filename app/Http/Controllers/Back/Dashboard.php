<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Page;

class Dashboard extends Controller
{
    public function index()
    {
        $article_count = Article::all()->count();
        $category_count = Category::all()->count();
        $page_count = Page::all()->count();
        $hit = Article::sum('hit');

        return view('back.dashboard', compact('article_count', 'category_count', 'page_count', 'hit'));
    }
}
