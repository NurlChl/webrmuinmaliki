<?php

namespace App\Http\Controllers;

use App\Http\Requests\RuleCategoryRequest;
use App\Models\RuleCategory;
use Illuminate\Database\QueryException;

class RuleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruleCategories = RuleCategory::query()->latest()->paginate(10);

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
        $ruleCategories = RuleCategory::query()->latest()->paginate(10);

        return view('rule_categories.index', [

            'rule_categories' => $ruleCategories,

            'rule_category' => $ruleCategory,
            'page_meta' => [
                'title' => 'Edit Kategori Peraturan',
                'method' => 'put',
                'url' => route('rule_categories.update', $ruleCategory),
            ]

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RuleCategoryRequest $request, RuleCategory $ruleCategory)
    {
        $ruleCategory->update([

            'name' => $request->name,

        ]);

        return to_route('rule_categories.index')->with('success',  'Kategori Peraturan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RuleCategory $ruleCategory)
    {
        // $ruleCategory->delete();

        // return back()->with('success',  $ruleCategory->name .' berhasil dihapus');

        try {
            $ruleCategory->delete();
            return back()->with('success', $ruleCategory->name . ' berhasil dihapus');
        } catch (QueryException $e) {
            $e;
            return back()->with('success', 'Gagal menghapus ' . $ruleCategory->name . ' karena masih memiliki relasi dengan data lain.');
        }
    }
}
