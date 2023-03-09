<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\PutRequest;
use App\Http\Requests\Category\StoreRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Category::paginate(10));
    }

    /**
     * Display a listing of the resource.
     */
    public function all()
    {
        return response()->json(Category::get());
    }

    // /**
    //  * Display the specified resource by his 'slug'.
    //  */
    // public function slug($slug)
    // {
    //     $category = Category::where("slug", $slug)->firstOrFail();
    //     return response()->json($category);
    // }

    /**
     * Display the specified resource by his 'slug'.
     */
    public function slug(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        return response()->json(Category::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Category $category)
    {
        $category->update($request->validated());
        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $del = $category->delete();
        return response()->json($del);
    }

    /**
     * Get all the post relationed at a category
     */
    public function posts(Category $category)
    {
        //     $posts = Post::join('categories', "categories.id","=", "posts.category_id")
        //         ->select("posts.*", "categories.title as category")
        //         ->where("categories.id", $category->id)
        //         ->get();

        $posts = Post::with("category")
            ->where("category_id", $category->id)
            ->get();

        return response()->json($posts);
    }
}
