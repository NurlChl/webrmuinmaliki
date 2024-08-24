<?php

namespace App\Http\Controllers;

use App\Http\Requests\RuleCategoryRequest;
use App\Models\RuleCategory;

class RuleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruleCategories = RuleCategory::query()->latest()->paginate(20);

        return view('rule_categories.index', [

            'rule_categories' => $ruleCategories,

            'rule_category' => new RuleCategory(),
            'page_meta' => [
                'title' => 'Kategori Peraturan',
                'method' => 'post',
                'url' => route('rule_categories.store'),
            ]

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member_categories.index', [

            'rule_category' => new RuleCategory(),
            'page_meta' => [
                'title' => 'Kategori Peraturan',
                'method' => 'post',
                'url' => route('rule_categories.store'),
            ]

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RuleCategoryRequest $request)
    {
        RuleCategory::create(
            $request->validated(),

        );

        return back()->with('success', 'Kategori Peraturan berhasil  ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(RuleCategory $ruleCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RuleCategory $ruleCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RuleCategoryRequest $request, RuleCategory $ruleCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RuleCategory $ruleCategory)
    {
        $ruleCategory->delete();

        return back()->with('success',  $ruleCategory->name .' berhasil dihapus');
    }
}
