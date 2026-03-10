<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $blogs = Blog::query()->paginate(2);
        return view('blogs.index', [
            'blogs' => $blogs
        ]);
    }

    public function show(Blog $blog): View
    {
        return view('blogs.show', [
            'blog' => $blog
        ]);
    }
}
