<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PwcDbNews;

class BlogController extends Controller
{
    public function show($slug)
    {
        $post = PwcDbNews::where('slug', $slug)->firstOrFail();
        return view('blog.article', compact('post'));
    }

    public function category($categoryslug)
    {
        $posts = PwcDbNews::where('categoryslug', $categoryslug)->orderByDesc('date')->orderByDesc('id')->get();
        return view('blog.category', compact('posts'));
    }
}
