<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\PostCreationRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * CRUD post
     */

    private function manyToMany($str, $model, $nameСolumns)
    {
        $array = array_filter(array_map('trim', explode("\n", $str)));
        $arrayId = [];

        foreach ($array as $item) {
            $arrayId[] = $model::firstOrCreate([$nameСolumns => $item])->id;
        }

        return $arrayId;
    }

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
            'id' => $post->id,
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

        $postAdd->slug = $postAdd->id . ':' . Str::slug($request->input('title'));
        $postAdd->save();

        $tagsId = $this->manyToMany($request->input('tagline'), Tag::class, 'name');
        $postAdd->tags()->sync($tagsId);

        $categoriesId = $this->manyToMany($request->input('categories'), Category::class, 'name');
        $postAdd->categories()->sync($categoriesId);

        return redirect('/post/' . $postAdd->slug);
    }


    public function showPostEditing($id)
    {
        $post = Post::find($id);

        $categoryName = [];

        foreach ($post->categories as $category){
            $categoryName[] = $category->name;
        }

        $categories = implode("\n", $categoryName);

        $tagName = [];

        foreach ($post->tags as $tag){
            $tagName[] = $tag->name;
        }

        $tags = implode("\n", $tagName);

        return view('layouts.secondary',[
            'page' => 'pages.post-update',
            'title' => 'Редактирование поста',
            'titlePost' => $post->title,
            'image' => $post->image,
            'announce' => $post->announce,
            'fulltext' => $post->fulltext,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    public function postEditing($id, Request $request)
    {
        $post = Post::find($id);

        $post->image = $request->input('image');
        $post->title = $request->input('title');
        $post->slug = $post->id . ':' . Str::slug($request->input('title'));
        $post->announce = $request->input('announce');
        $post->fulltext = $request->input('fulltext');
        $post->save();

        $categoriesId = $this->manyToMany($request->input('categories'), Category::class, 'name');
        $post->categories()->sync($categoriesId);

        $tagsId = $this->manyToMany($request->input('tagline'), Tag::class, 'name');
        $post->tags()->sync($tagsId);

        return redirect('/post/' . $post->slug);
    }


    public function postDeletion($id)
    {
        Post::find($id)->delete();
        return redirect('/');
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
