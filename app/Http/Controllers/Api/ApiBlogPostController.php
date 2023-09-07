<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class ApiBlogPostController extends Controller
{

    public function show(Post $post)
    {
        return new PostResource($post);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'body' => 'required',
            'author_id' => 'required',
            'status' => 'nullable',
        ]);

        $data = $request->all();

        $post->update($data);

        $post->categories()->sync($request->categories);
        $post->syncTags($request->tags);

        if ($request->input('featured_image') != null) {
            // Process featured image
            $post->clearMediaCollection('featured_image');
            $post->addMediaFromUrl($request->input('featured_image'))->preservingOriginal()->toMediaCollection('featured_image');
        }

        return response()->json(['message' => 'Post updated successfully'], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'body' => 'required',
            'author_id' => 'required',
            'status' => 'nullable',
        ]);

        $data = $request->only(['title','slug','body','author_id','status']);

        $post = Post::updateOrCreate([
            'title->'.app()->getLocale() => $data['title'],
        ],$data);

        $categories = [];
        if(isset($request->categories) and is_array($request->categories)){
            foreach($request->categories as $category){
                $cat = Category::updateOrCreate([
                    'title->'.app()->getLocale() => $category,
                    'model_type' => '\App\Models\Post',
                ],[
                    'title' => $category,
                    'model_type' => '\App\Models\Post',
                    'parent_id' => null,
                    'menu_icon' => null, 
                ]);
                $categories[] = $cat->id;
            }
        }

        // $post->categories()->sync($categories);
        $post->syncTags($request->tags ?? []);

        if ($request->input('featured_image') != null) {
            // Process featured image
            $post->clearMediaCollection('featured_image');
            $post->addMediaFromUrl($request->input('featured_image'))->preservingOriginal()->toMediaCollection('featured_image');
        }

        return response()->json(['message' => 'Post created successfully'], 200);
    }

    public function storeAll(Request $request)
    {
        foreach ($request->all() as $post) {
            $request = new Request($post);
            $this->store($request);
        }
    }
}
