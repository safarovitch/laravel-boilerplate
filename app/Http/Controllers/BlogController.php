<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    // public function index()
    // {
    //     $posts = Post::all();
    //     $post = new Post();
    //     $dataTable = DataTables::of(User::query())->toJson();
    //     return view('blog.index', compact('posts', 'post', 'dataTable'));
    // }

    public function index()
    {
        if (request()->ajax()) {
            $tableData = DataTables::of(Post::all());
            $tableData->editColumn('body', function ($post) {
                return substr(strip_tags($post->body), 0, 70).'...';
            });
            $tableData->editColumn('author', function ($post) {
                return $post->author ? $post->author->name : 'Anonymous';
            });
            $tableData->addColumn('title', function ($post) {
                $title = substr(strip_tags($post->title), 0, 50).'...';
                return '
                <a class="d-flex align-items-center" href="'.route('post.edit', $post).'">
                    <div class="flex-shrink-0">
                      <img class="avatar avatar-lg" src="'.$post->featured_image.'" alt="'.$title.'">
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <h5 class="text-inherit mb-0">'.$title.'</h5>
                    </div>
                </a>';
            });
            $tableData->addColumn('actions', function ($post) {
                $r = "<div class='d-flex'>";
                // $r .= '<a class="btn btn-outline-primary btn-sm mr-2" href="'.route('post.show', $post).'"><i class="bi bi-eye"></i></a>';
                $r .= '<a class="btn btn-outline-primary btn-sm mr-2" href="'.route('post.edit', $post).'"><i class="bi bi-pencil"></i></a>';
                $r .= '<form action="'.route('post.destroy', $post).'" method="POST" onSubmit="return confirm(\''.__("confirmation.blog.post.destroy").'\')">'.csrf_field().method_field('delete').'<button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button></form>';
                $r .= "</div>";
                return $r;
            });
            $tableData->addColumn('status', function ($post) {
                return getStatusHtml($post->status);
            });
            return $tableData->rawColumns(['title','actions', 'status'])->make();
        }

        $dataTables = [
            ['data' => 'title', 'name' => 'title', 'title' => __("blog.post_title")],
            ['data' => 'body', 'name' => 'body', 'title' => __("blog.post_body")],
            ['data' => 'author', 'name' => 'author', 'title' => __("blog.post_author")],
            ['data' => 'status', 'name' => 'status', 'title' => __("blog.post_status")],
            ['data' => 'actions', 'name' => 'actions', 'title' => __("action.table_actions")],
        ];

        $dataOrder = "[0, 'DESC']";

        return view('blog.index', compact('dataTables', 'dataOrder'));
    }


    public function create()
    {
        return view('blog.form');
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'status' => 'required',
        ]);


        $data = $request->all();
        $data['author_id'] = auth()->id();

        $post = Post::create($data);

        $post->categories()->sync($request->categories ?? []);
        $post->syncTags($request->tags ?? []);

        if ($request->input('featured_image') != null) {
            // Process profile image
            $file = uploadSlimImage($request, 'featured_image');
            $post->addMedia($file['featured_image'])->preservingOriginal()->toMediaCollection('featured_image');
        }

        return redirect()->route('post.show', $post->id)->with('success', __('blog.post.created'));
    }

    public function show(Post $post)
    {
        return view('blog.form', compact('post'));

        //return redirect($post->getUrl());
        //return view('blog.form', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('blog.form', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $data = $request->all();
        $data['author_id'] = auth()->id();

        $post->update($data);
        $post->categories()->sync($request->categories ?? []);
        $post->syncTags($request->tags ?? []);

        if ($request->input('featured_image') != null) {
            // Process profile image
            $file = uploadSlimImage($request, 'featured_image');
            $post->clearMediaCollection('featured_image');
            $post->addMedia($file['featured_image'])->preservingOriginal()->toMediaCollection('featured_image');
        }

        return redirect()->back()->with('success', __('blog.post.updated'));
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', __('message.blog.post.deleted'));
    }

    public function categories()
    {
        $parentList = Category::where('model_type', 'App\Models\Post')->get();
        $categories = Category::main()->where('model_type', 'App\Models\Post')->get();
        return view('blog.category.index', compact('categories', 'parentList'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $data = array_merge(
            $request->all(),
            ['model_type' => 'App\Models\Post']
        );

        Category::create($data);

        return redirect()->back()->with('success', __('message.blog.category.created'));
    }
}

