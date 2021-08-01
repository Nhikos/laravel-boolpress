<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;
use App\Tag;

class PostController extends Controller
{

    private $validationArray = [
        'title' => 'required|max:255',
        'author' => 'max:150',
        'content' => 'required',
        'category_id' => 'exists:categories,id|nullable',
        'tags_id' => 'exists:tags,id'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(6);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate($this->validationArray);
        $data = $request->all();
        
        $data['slug'] = Str::of($data['title'])->slug();
        $newPost = new Post();
        $newPost->fill($data);
        $newPost->save();
        if(array_key_exists('tags_id', $data)){
            $newPost->tags()->attach($data['tags_id']);
        }
        return redirect()->route('admin.posts.index')->with('created',$newPost->title);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $data['slug'] = Str::of($data['title'])->slug();
        $request->validate($this->validationArray);
        $post->update($data);
        if(array_key_exists('tags_id', $data)){
            $post->tags()->sync($data['tags_id']);
        }else{
            $post->tags()->detach();
        }
        return redirect()->route('admin.posts.show', $post)->with('update', $post->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('admin.posts.index')->with('deleted', $post->title);
    }
}
