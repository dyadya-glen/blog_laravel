<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\PostCreationRequest;

class PostController extends Controller
{
    /**
     * CRUD post
     */

    public function postBySlug($slug)
    {
        $post = Post::where('slug', $slug)
            ->first();
        $tagName = [];
        foreach ($post->tags as $tag){
            $tagName[] = $tag->name;
        }
        $helpSingle = resolve('MyHelpSingle');

        return view('layouts.secondary',[
            'page' => 'pages.post',
            'title' => $post->title,
            'text' => $post->fulltext,
            'image' => $post->image,
            'tagsArr' => $tagName,
            'date' => $helpSingle->getRusDate($post->created_at, 'd %MONTH% Y', 'g'),
        ]);
    }


    public function showCreationOfPost()
    {
        return view('layouts.secondary',[
            'page' => 'pages.post-create',
            'title' => 'Новый пост',
        ]);
    }

    public function creationOfPost(PostCreationRequest $request)
    {
        $postAdd = Post::create([
            'user_id' => 1,
            'image' => $request->input('image'),
            'title' => $request->input('title'),
            'slug' => 'slug',
            'announce' => $request->input('announce'),
            'fulltext' => $request->input('fulltext'),
        ]);

        $tags = array_filter(array_map('trim', explode("\n", $request->input('tagline'))));
        $tagsId = [];

        foreach ($tags as $tag) {
            $tagsId[] = Tag::firstOrCreate(['name' => $tag])->id;//функция проверяет наличие тега в базе и если его нет, добавляет его в базу
        }

        $categories = array_filter(array_map('trim', explode("\n", $request->input('categories'))));
        $categoriesId = [];

        foreach ($categories as $category) {
            $categoriesId[] = Category::firstOrCreate(['name' => $category])->id;
        }

        $slug = Str::slug($request->input('title'));

        $postAdd->slug = $postAdd->id . ':' . $slug;
        $postAdd->save();
        $postAdd->tags()->sync($tagsId);
        $postAdd->categories()->sync($categoriesId);

        return redirect('/post/' . $postAdd->slug);
    }


    public function showPostEditing($id)
    {
        return view('layouts.secondary',[
            'page' => 'pages.post-update',
            'title' => 'Редактирование поста',
        ]);
    }

    public function postEditing($id)
    {

    }


    public function postDeletion($id)
    {

    }

    /**
     * sorting posts
     */

    public function listByTag($tag)
    {
        $postByTag = Tag::where('name', $tag)
            ->first()
            ->posts;

        $helpSingle = resolve('MyHelpSingle');

        return view('layouts.primary',[
            'page' => 'pages.main',
            'title' => 'Главная',
            'date' => $helpSingle,
            'posts' => $postByTag,
        ]);
    }

    public function listByCategory($category)
    {
        $postByCategory = Category::where('name', $category)
            ->first()
            ->posts;

        $helpSingle = resolve('MyHelpSingle');

        return view('layouts.primary',[
            'page' => 'pages.main',
            'title' => 'Главная',
            'date' => $helpSingle,
            'posts' => $postByCategory,
            ]);
    }
}
