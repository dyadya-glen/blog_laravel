<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
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
        $tegsArr = explode(', ', $post->tagline);
        $helpSingle = resolve('MyHelpSingle');

        return view('layouts.secondary',[
            'page' => 'pages.post',
            'title' => $post->title,
            'text' => $post->fulltext,
            'image' => $post->image,
            'tagline' => $post->tagline,
            'tegsArr' => $tegsArr,
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
        $tagsNameStr = '';
        foreach ($tags as $tag) {
            if(!Tag::where('name', $tag)->first()) {
                Tag::create(['name' => $tag]);
            }
            $tagsNameStr .= $tag . ', ';
        }

        $tagline = rtrim($tagsNameStr, ', ');
        $slug = Str::slug($request->input('title'));

        try{
            $postAdd = Post::create([
                'user_id' => 1,
                'image' => $request->input('image'),
                'title' => $request->input('title'),
                'slug' => '',
                'tagline' => $tagline,
                'announce' => $request->input('announce'),
                'fulltext' => $request->input('fulltext'),
            ]);

            $postAdd->slug = $postAdd->id . ':' . $slug;
            $postAdd->save();

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

    }

    public function listByCategory($category)
    {

    }


}
