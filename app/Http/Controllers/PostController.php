<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\MemberCategory;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function dashboard()
    {
        $posts = Post::query()
            ->with('member_category', fn($query) => $query->select(['id', 'name']))
            ->filter(request(['category']))
            ->latest()
            ->paginate(10);

        return view('posts.dashboard', [
            'posts' => $posts,
            'member_categories' => MemberCategory::all(),

        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query()
            ->with('member_category', fn($query) => $query->select(['id', 'name']))
            ->filter(request(['category']))
            ->latest()
            ->paginate(10);
        $postsPopuler = Post::query()
            ->with('member_category:id,name')
            ->orderBy('views', 'desc')
            ->limit(10)->get();

        $memberCategory = MemberCategory::all();

        return view('posts.index', [
            'posts' => $posts,
            'member_categories' => $memberCategory,
            'posts_populer' => $postsPopuler,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.form', [

            'post' => new Post(),
            'member_categories' => MemberCategory::all(),
            'page_meta' => [
                'title' => 'Tambah Berita',
                'method' => 'post',
                'url' => route('posts.store'),
            ]

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {

        // dd($request->file('image'));
        // dd($request);

        $file = $request->file('image');


        $request->user()->posts()->create([

            ...$request->validated(),

            ...['image' => $file->store('images/posts')],
        ]);

        return to_route('posts.index')->with('success', 'Berita berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $sessionKey = 'post_' . $post->slug . '_viewed';

        if (!session()->has($sessionKey)) {
            $post->increment('views');
            session()->put($sessionKey, true); // Set session untuk mencegah penambahan views pada refresh
        }

        return view('posts.show', [
            'post' => $post,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        Gate::authorize('update', $post);

        return view('posts.form', [


            'post' => $post,
            'member_categories' => MemberCategory::all(),
            'page_meta' => [
                'title' => 'Edit Berita',
                'method' => 'put',
                'url' => route('posts.update', $post),
            ]

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {

        if ($request->hasFile('image')) {

            Storage::delete($post->image);

            $file = $request->file('image')->store('image/posts');
        } else {

            $file = $post->image;
        }

        $post->update([

            'tittle' => $request->tittle,
            'body' => $request->body,
            'image' => $file,

        ]);

        return to_route('posts.index')->with('success', 'Berita berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Berita berhasil dihapus');
    }


    public function bulkDelete(Request $request)
    {
        // return dd($request->ids);
        $ids = $request->ids;

        if (is_array($ids) && count($ids) > 0) {
            Post::whereIn('id', $ids)->delete();
            return redirect()->back()->with('success', 'Berita terpilih berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Tidak ada berita yang terhapus.');
    }
}
