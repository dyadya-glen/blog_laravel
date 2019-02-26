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
        $tagsStr = $request->input('tagline');
        $tags = explode("\r\n", $tagsStr);
        $tags = array_diff($tags, array('', null));
        $tagsId = [];

        foreach ($tags as $tag) {
            if(!Tag::where('name', $tag)->first()) {
                Tag::create(['name' => $tag]);
            }
            $tagsId[] = Tag::where('name', $tag)->first()->id;
        }


        $categoriesStr = $request->input('categories');
        $categories = explode("\r\n", $categoriesStr);
        $categories = array_diff($categories, array('', null));
        $categoriesId = [];

        foreach ($categories as $category) {
            if(!Category::where('name', $category)->first()) {
                Category::create(['name' => $category]);
            }
            $categoriesId[] = Category::where('name', $category)->first()->id;
        }

        $slug = Str::slug($request->input('title'));

        try{
            $postAdd = Post::create([
                'user_id' => 1,
                'image' => $request->input('image'),
                'title' => $request->input('title'),
                'slug' => '',
                'announce' => $request->input('announce'),
                'fulltext' => $request->input('fulltext'),
            ]);

            $postAdd->slug = $postAdd->id . ':' . $slug;
            $postAdd->save();
            $postAdd->tags()->sync($tagsId);
            $postAdd->categories()->sync($categoriesId);

        } catch (\Exception $e ){
            $postAdd = false;
        }
        if (!$postAdd) {
            return redirect()
                ->back();
        }

        return redirect('/post/' . $postAdd->slug);
    }


    public function showPostEditing($id)
    {

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
