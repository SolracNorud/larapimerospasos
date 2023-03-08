<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Post::paginate(10));
    }

    /**
     * Display a listing of all of the resource.
     */
    public function all()
    {
        return response()->json(Post::get());
    }

    // /**
    //  * Display the specified resource by his 'slug'.
    //  */
    // public function slug($slug)
    // {
    //     $post = Post::with("category")->where("slug", $slug)->firstOrFail();
    //     return response()->json($post);
    // }

    /**
     * Display the specified resource by his 'slug'.
     */
    public function slug(Post $post)
    {
        $post->category;
        return response()->json($post);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        return response()->json(Post::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {
        return response()->json($post->update($request->validate()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $del = $post->delete();
        if ($del) {
            return response()->json("DELETED");
        }
    }
}
