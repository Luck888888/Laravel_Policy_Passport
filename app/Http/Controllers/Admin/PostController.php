<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Post $post)
    {

        if (Gate::allows('view-manager', $post)) {
            $posts = Post::with('category')->paginate(10);
        } else {
            $posts = Post::with('category')
                ->whereUserId(auth()->user()->id)->orderByDesc('created_at')
                ->paginate(10);
        }
        return view('admin.posts.index', compact('posts'));

    }

    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'category_id' => 'required|integer',
            'thumbnail'   => 'nullable|image',
        ]);

        $data = $request->all();
        $data['thumbnail'] = Post::uploadImage($request);
        $data['user_id'] = Auth::user()->id;

        $post = Post::create($data);

        return redirect()->route('posts.index')->with('success', 'Статья добавлена');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::pluck('title', 'id')->all();

        return view('admin.posts.edit', compact('categories', 'post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required',
            'category_id' => 'required|integer',
            'thumbnail'   => 'nullable|image',
        ]);
        $post = Post::find($id);
        $data = $request->all();
        if ($file = Post::uploadImage($request, $post->thumbnail)) {
            $data['thumbnail'] = $file;
        }

        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Изменения сохранены');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        Storage::delete($post->thumbnail);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Статья удалена');
    }
}
