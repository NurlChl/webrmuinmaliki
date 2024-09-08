<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutRequest;
use App\Models\About;
use App\Models\Faculty;
use App\Models\Member;
use App\Models\MemberCategory;
use App\Models\Rule;
use Illuminate\Validation\ValidationException;

class AboutController extends Controller
{

    public function dashboard ()
    {
        $about = About::query()->first();

        return view('abouts.dashboard', [

            'about' => $about,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::query()->first();
        $member = Member::all();
        $faculty = Faculty::all();
        $member_category = MemberCategory::all();
        $rule = Rule::all();

        return view('abouts.index', [

            'about' => $about,
            'member' => sprintf('%02d', $member->count()),
            'faculty' => sprintf('%02d', $faculty->count()),
            'member_category' => sprintf('%02d', $member_category->count()),
            'rule' => sprintf('%02d', $rule->count()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('abouts.form', [

            'about' => new About(),
            'page_meta' => [
                'title' => 'Tambah Tentang',
                'method' => 'post',
                'url' => route('abouts.store'),
            ]

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutRequest $request)
    {
        if (About::count() > 0) {
            throw ValidationException::withMessages([
                'info' => 'Hanya satu data yang diperbolehkan di tabel ini.',
            ]);
        }

        About::create(
            $request->validated(),

        );

        return to_route('abouts.index')->with('success', 'Tentang berhasil  ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        $abouts = About::query()->first();

        return view('abouts.form', [

            'abouts' => $abouts,

            'about' => $about,
            'page_meta' => [
                'title' => 'Edit Tentang',
                'method' => 'put',
                'url' => route('abouts.update', $about),
            ]

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutRequest $request, About $about)
    {
        $about->update([

            'body' => $request->body,

        ]);

        return to_route('abouts.index')->with('success',  'Tentang berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }
}
