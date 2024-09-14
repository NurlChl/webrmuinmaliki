<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExtracurricularRequest;
use App\Models\Extracurricular;
use Illuminate\Support\Facades\Storage;

class ExtracurricularController extends Controller
{
    public function dashboard () 
    {
        $extracurriculars = Extracurricular::query()
            ->latest()
            ->paginate(15);


        return view('extracurriculars.dashboard', [

            'extracurriculars' => $extracurriculars,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $extracurriculars = Extracurricular::query()
            ->latest()
            ->paginate(15);
       

        return view('extracurriculars.index', [
            'extracurriculars' => $extracurriculars,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('extracurriculars.form', [

            'extracurricular' => new Extracurricular(),
            'page_meta' => [
                'title' => 'Tambah UKM',
                'method' => 'post',
                'url' => route('extracurriculars.store'),
            ]

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExtracurricularRequest $request)
    {
        $file = $request->file('image');


        Extracurricular::create([

            ...$request->validated(),

            ...['image' => $file->store('images/extracurricular')],
        ]);

        return to_route('extracurriculars.index')->with('success', 'UKM berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Extracurricular $extracurricular)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Extracurricular $extracurricular)
    {
        return view('extracurriculars.form', [


            'extracurricular' => $extracurricular,
            'page_meta' => [
                'title' => 'Edit UKM',
                'method' => 'put',
                'url' => route('extracurriculars.update', $extracurricular),
            ]

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExtracurricularRequest $request, Extracurricular $extracurricular)
    {
        if ($request->hasFile('image')) {

            Storage::delete($extracurricular->image);

            $file = $request->file('image')->store('image/extracurricular');
        } else {

            $file = $extracurricular->image;
        }

        $extracurricular->update([

            'name' => $request->name,
            'leader_name' => $request->leader_name,
            'image' => $file,
            'contact' => $request->contact,
            'body' => $request->body,

        ]);

        return to_route('extracurriculars.index')->with('success', 'UKM: ' . $request->name . ' : berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Extracurricular $extracurricular)
    {
        $extracurricular->delete();

        return to_route('extracurriculars.index')->with('success','ukm: ' . $extracurricular->name . ' : berhasil dihapus');
    }
}
