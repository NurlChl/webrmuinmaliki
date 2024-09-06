<?php

namespace App\Http\Controllers;

use App\Http\Requests\RuleRequest;
use App\Models\Rule;
use App\Models\RuleCategory;
use Illuminate\Http\Request;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class RuleController extends Controller
{

    public function dashboard ()
    {
        $requestCategory = request('category');
        $selectedCategory = $requestCategory ? RuleCategory::where('slug', $requestCategory)->first()->name : null;

        $requestPeriod = request('period');
        $selectedPeriod = $requestPeriod ?? null;

        $rules = Rule::query()
                    ->with('ruleCategory', fn ($query) => $query->select(['id', 'name']))
                    ->filterRule(request()->only(['search', 'category',]))
                    ->filterRulePeriod(request()->only(['period',]))
                    ->orderBy('period', 'desc')
                    ->paginate(10);
        
        return view('rules.dashboard', [
            'rule_categories' => RuleCategory::all(),
            'rules' => $rules,

            'selectedCategory' => $selectedCategory,
            'selectedPeriod' => $selectedPeriod,

        ]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {   

        $requestCategory = request('category');
        $selectedCategory = $requestCategory ? RuleCategory::where('slug', $requestCategory)->first()->name : null;

        $requestPeriod = request('period');
        $selectedPeriod = $requestPeriod ?? null;

        $rules = Rule::query()
                    ->with('ruleCategory', fn ($query) => $query->select(['id', 'name']))
                    ->filterRule(request()->only(['search', 'category',]))
                    ->filterRulePeriod(request()->only(['period',]))
                    ->orderBy('period', 'desc')
                    ->paginate(10);
        
        return view('rules.index', [
            'rule_categories' => RuleCategory::all(),
            'rules' => $rules,

            'selectedCategory' => $selectedCategory,
            'selectedPeriod' => $selectedPeriod,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rules.form', [

            'rule' => new Rule(),
            'rule_categories' => RuleCategory::all(),
            'page_meta' => [
                'title' => 'Tambah Aturan',
                'method' => 'post',
                'url' => route('rules.store'),
            ]

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RuleRequest $request)
    {
        // dd($request->validated());

        $file = $request->file('file');


        Rule::create([

            ...$request->validated(),

            ...['file' => $file->store('files/rules')],
        ]);

        return back()->with('success', 'Aturan baru berhasil ditambahkan');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Rule $rule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rule $rule)
    {
        return view('rules.form', [

            'rule' => $rule,
            'rule_categories' => RuleCategory::all(),
            'selectedCategory' => $rule->rule_category_id,
            'page_meta' => [
                'title' => 'Edit Aturan : ' . Str::limit($rule->name, 50),
                'method' => 'put',
                'url' => route('rules.update', $rule),
            ]

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RuleRequest $request, Rule $rule)
    {
        if ($request->hasFile('file')) {

            Storage::delete($rule->file);

            $file = $request->file('file')->store('file/rules');

        } else {

            $file = $rule->file;

        }

        $rule->update([

            'name' => $request->name,
            'period' => $request->period,
            'file' => $file,
            'rule_category_id' => $request->rule_category_id,

        ]);

        return to_route('rules.index')->with('success',  Str::limit($request->name, 20) . ' : berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rule $rule)
    {
        $rule->delete();

        return to_route('rules.index')->with('success', Str::limit($rule->name, 20) . ' : berhasil dihapus');
    }

    public function bulkDelete(Request $request)
    {
        // return dd($request->ids);
        $ids = $request->ids;

        if (is_array($ids) && count($ids) > 0) {
            Rule::whereIn('id', $ids)->delete();
            return redirect()->back()->with('success', 'peraturan terpilih berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Tidak ada peraturan yang terhapus.');
    }
}
