<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = [
            ['id' => 1, 'name' => 'Article One'],
            ['id' => 2, 'name' => 'Article Two']
        ];
        return view('articles.index',compact('articles'));
    }
}
