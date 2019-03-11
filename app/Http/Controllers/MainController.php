<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class MainController extends Controller
{
    public function index()
    {
//        $posts = Cache::remember('allPosts', env('CACHE_TIME', 0), function () {
//            return Post::all();
//        });
        $posts = Post::all();

        $helpSingle = resolve('MyHelpSingle');

        return view('layouts.primary',[
            'page' => 'pages.main',
            'title' => 'Главная',
            'date' => $helpSingle,
            'posts' => $posts,
        ]);
    }
}
