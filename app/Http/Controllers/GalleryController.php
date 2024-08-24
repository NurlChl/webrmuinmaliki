<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::query()->latest()->limit(10)->get();
        $totalGalleries = $galleries->count();
        
        return view('galleries.index', [
            'galleries' => $galleries,
            'totalGalleries' =>$totalGalleries,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('galleries.form', [
            'gallery' => new Gallery(),
            'page_meta' => [
                'title' => 'Tambah Foto',
                'method' => 'post',
                'url' => route('galleries.store'),
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryRequest $request)
    {
        $file = $request->file('image');


        Gallery::create([

            ...$request->validated(),
            
            ...['image' => $file->store('images/galleries')],
        ]);

        return back()->with('success', 'Foto baru ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {

        return view('galleries.form', [

            'gallery' => $gallery,
            'page_meta' => [
                'title' => 'Edit Foto',
                'method' => 'put',
                'url' => route('galleries.update', $gallery),
            ]

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GalleryRequest $request, Gallery $gallery)
    {

        if ($request->hasFile('image')) {

            Storage::delete($gallery->image);

            $image = $request->file('image')->store('image/galleries');

        } else {

            $image = $gallery->image;

        }

        $gallery->update([

            'description' => $request->description,
            'image' => $image,

        ]);

        return to_route('galleries.index')->with('success',  'Foto berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        // dd($gallery);

        return to_route('galleries.index')->with('success',  ' Foto berhasil dihapus');
    }
}
