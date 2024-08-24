<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberCategoryRequest;
use App\Models\MemberCategory;

class MemberCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memberCategories = MemberCategory::query()->latest()->paginate(20);

        return view('member_categories.index', [

            'member_categories' => $memberCategories,

            'member_category' => new MemberCategory(),
            'page_meta' => [
                'title' => 'Kategori Anggota',
                'method' => 'post',
                'url' => route('member_categories.store'),
            ]

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member_categories.index', [

            'member_category' => new MemberCategory(),
            'page_meta' => [
                'title' => 'Kategori Anggota',
                'method' => 'post',
                'url' => route('member_categories.store'),
            ]

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberCategoryRequest $request)
    {
        MemberCategory::create(
            $request->validated(),

        );

        return back()->with('success', 'Kategori Anggota berhasil  ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(MemberCategory $memberCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MemberCategory $memberCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberCategoryRequest $request, MemberCategory $memberCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MemberCategory $memberCategory)
    {
        $memberCategory->delete();

        return back()->with('success',  $memberCategory->name .' berhasil dihapus');
    }
}
