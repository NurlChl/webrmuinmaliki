<?php

namespace App\Http\Controllers;

use App\Http\Requests\FacultyRequest;
use App\Models\Faculty;
use Illuminate\Database\QueryException;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faculties = Faculty::query()->latest()->paginate(20);

        return view('faculties.index', [
            'faculties' => $faculties,

            'faculty' => new Faculty(),
            'page_meta' => [
                'title' => 'Fakultas',
                'method' => 'post',
                'url' => route('faculties.store'),
            ]

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('faculties.index', [

            'faculty' => new Faculty(),
            'page_meta' => [
                'title' => 'Fakultas',
                'method' => 'post',
                'url' => route('faculties.store'),
            ]

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FacultyRequest $request)
    {

        // dd($request->validated());
        Faculty::create(
            $request->validated(),

        );

        return back()->with('success', 'Fakultas berhasil  ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faculty $faculty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faculty $faculty)
    {
        $faculties = Faculty::query()->latest()->paginate(20);

        return view('faculties.index', [

            'faculties' => $faculties,

            'faculty' => $faculty,
            'page_meta' => [
                'title' => 'Edit Fakultas',
                'method' => 'put',
                'url' => route('faculties.update', $faculty),
            ]

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FacultyRequest $request, Faculty $faculty)
    {
        $faculty->update([

            'name' => $request->name,
            'color' => $request->color,

        ]);

        return to_route('faculties.index')->with('success',  'fakultas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty)
    {
        // $faculty->delete();

        // return back()->with('success',  'Fak. ' . $faculty->name .' berhasil dihapus');

        try {
            $faculty->delete();
            return back()->with('success', $faculty->name . ' berhasil dihapus');
        } catch (QueryException $e) {
            $e;
            return back()->with('success', 'Gagal menghapus ' . $faculty->name . ' karena masih memiliki relasi dengan data lain.');
        }
    }
}
