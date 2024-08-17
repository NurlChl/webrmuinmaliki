<?php

namespace App\Http\Controllers;

use App\Http\Requests\AspirationRequest;
use App\Models\Aspiration;
use App\Models\AspirationType;
use App\Models\Faculty;
use Illuminate\Http\Request;

class AspirationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $aspirations = Aspiration::query()
            ->with([
                'faculty' => fn($query) => $query->select(['id', 'name', 'color']),
                'aspirationType' => fn($query) => $query->select(['id', 'name'])

            ])
            ->latest()
            ->paginate(10);

        $count = $aspirations->total();

        return view('aspirations.index', [

            'aspirations' => $aspirations,
            'count' => $count,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return view('aspirations.form', [

            'aspiration' => new Aspiration(),
            'faculties' => Faculty::all(),
            'aspiration_types' => AspirationType::all(),
            // 'default_type' => AspirationType::first()->id,
            'page_meta' => [
                'title' => 'Aspirasi Mahasiswa',
                'method' => 'post',
                'url' => route('aspirations.store'),
            ]

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AspirationRequest $request)
    {
        // dd($request->validated());
        // dd($request);

        Aspiration::create(
            $request->validated(),

        );

        return back()->with('success', 'Aspirasimu sudah terkirim');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aspiration $aspiration)
    {
        return view('aspirations.show', [
            'aspiration' => $aspiration,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aspiration $aspiration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aspiration $aspiration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aspiration $aspiration)
    {
        //
    }
}
