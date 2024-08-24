<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {

        // dd($request->validated());
        
        Comment::create(
            $request->validated(),

        );

        return back()->with('success', 'Komentar sudah terkirim');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, Comment $comment)
    {
        $comment->update([
            'name' => $request->name,
            'body' => $request->body,
        ]);

        return back()->with('success',   'Komentar berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
            $comment->delete();

            return back()->with('success',  ' Komentar berhasil dihapus');
    }
}
