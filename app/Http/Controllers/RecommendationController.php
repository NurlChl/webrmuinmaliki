<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecommendationRequest;
use App\Models\Faculty;
use App\Models\Recommendation;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aspirations = Recommendation::query()
                                ->with('faculty', fn ($query) => $query->select(['id', 'name', 'color']))
                                ->latest()
                                ->paginate(10);
        

        return view('recommendations.index', [

            'recommendations' => $aspirations,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recommendations.form', [

            'aspiration' => new Recommendation(),
            'faculties' => Faculty::all(),
            'page_meta' => [
                'title' => 'Usulan Peraturan',
                'method' => 'post',
                'url' => route('recommendations.store'),
            ]

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RecommendationRequest $request)
    {
        // dd($request->validated());
        // dd($request);

        Recommendation::create(
            $request->validated(),
            
        );

        return back()->with('success', 'Usulanmu sudah terkirim');
    }

    /**
     * Display the specified resource.
     */
    public function show(Recommendation $recommendation)
    {
        return view('recommendations.show', [
            'aspiration' => $recommendation,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recommendation $recommendation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recommendation $recommendation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recommendation $recommendation)
    {
        //
    }
}
