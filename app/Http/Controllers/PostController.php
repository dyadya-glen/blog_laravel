<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\PostCreationRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @param $str - words from textarea
     * @param $model - entity model
     * @param $nameСolumns - name of the entity table column in the database
     * @return array - an array of identifiers of entities
     *
     * The function takes the words typed in the textarea,
     *  the model of the entity,
     *  the name of the column in the table entities in the database.
     *
     * Words are cleared of spaces and hyphens and collected in an array.
     *
     * Checks for array elements in the database table and adds those elements that are not there.
     *
     * Entity IDs are collected in an array and returned by the function.
     */

    private function stringInIDsOfArrayElements($str, $model, $nameСolumns)
    {
        $array = array_filter(array_map('trim', explode("\n", $str)));
        $arrayId = [];

        foreach ($array as $item) {
            $arrayId[] = $model::firstOrCreate([$nameСolumns => $item])->id;
        }

        return $arrayId;
    }

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
//        try{
//            $this->authorize('create');
//        } catch (\Exception $e){
//            return redirect()->back();
//        }
        //$this->authorize('create');
        //dump(Auth::id());
        $this->authorize('create');

        return view('layouts.secondary',[
            'page' => 'pages.post-create',
            'title' => 'Новый пост',
        ]);
    }

    public function creationOfPost(PostCreationRequest $request)
    {
        $postAdd = Post::create([
            'user_id' => Auth::id(),
            'image' => $request->input('image'),
            'title' => $request->input('title'),
            'slug' => 'slug',
            'announce' => $request->input('announce'),
            'fulltext' => $request->input('fulltext'),
        ]);

        $postAdd->slug = $postAdd->id . ':' . Str::slug($request->input('title'));
        $postAdd->save();

        $tagsId = $this->stringInIDsOfArrayElements($request->input('tagline'), Tag::class, 'name');
        $postAdd->tags()->sync($tagsId);

        $categoriesId = $this->stringInIDsOfArrayElements($request->input('categories'), Category::class, 'name');
        $postAdd->categories()->sync($categoriesId);

        return redirect('/post/' . $postAdd->slug);
    }


    public function showPostEditing($id)
    {
        if (Auth::id() === 1){
            $this->authorize('update');
        }
        else {
            $this->authorize('update', Post::find($id));
        }

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

        $categoriesId = $this->stringInIDsOfArrayElements($request->input('categories'), Category::class, 'name');
        $post->categories()->sync($categoriesId);

        $tagsId = $this->stringInIDsOfArrayElements($request->input('tagline'), Tag::class, 'name');
        $post->tags()->sync($tagsId);

        return redirect('/post/' . $post->slug);
    }


    public function postDeletion($id)
    {
        if (Auth::id() === 1){
            $this->authorize('delete');
        }
        else {
            $this->authorize('delete', Post::find($id));
        }

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
