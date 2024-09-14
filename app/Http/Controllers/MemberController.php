<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Models\Member;
use App\Models\MemberCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{


    // public function category(MemberCategory $category)
    // {
    //     // dd($category);

    //     $members = Member::where('member_category_id', $category->id)
    //                     ->with('memberCategory:id,name') 
    //                     ->latest()
    //                     ->paginate(10);
    //     $selectedCategory = $category->name;

    //     return view('members.index', [
    //         'member_categories' => MemberCategory::all(),
    //         'members' => $members,
    //         'selectedCategory' => $selectedCategory,
    //     ]);
    // }

    public function dashboard () 
    {
        $requestCategory = request('category');
        $selectedCategory = $requestCategory ? MemberCategory::where('slug', $requestCategory)->first()->name : null;

        $members = Member::query()
            ->with('memberCategory', fn($query) => $query->select(['id', 'name']))
            ->filter(request(['search', 'category']))
            ->latest()
            ->paginate(10);


        return view('members.dashboard', [

            'member_categories' => MemberCategory::all(),
            'members' => $members,
            'selectedCategory' => $selectedCategory,
        ]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requestCategory = request('category');
        $selectedCategory = $requestCategory ? MemberCategory::where('slug', $requestCategory)->first()->name : null;

        $members = Member::query()
            ->with('memberCategory', fn($query) => $query->select(['id', 'name']))
            ->filter(request(['search', 'category']))
            ->latest()
            ->paginate(10);


        return view('members.index', [

            'member_categories' => MemberCategory::all(),
            'members' => $members,
            'selectedCategory' => $selectedCategory,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.form', [

            'member' => new Member(),
            'member_categories' => MemberCategory::all(),
            'page_meta' => [
                'title' => 'Tambah Anggota',
                'method' => 'post',
                'url' => route('members.store'),
            ]

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberRequest $request)
    {
        // dd($request->validated());

        $file = $request->file('image');


        Member::create([

            ...$request->validated(),

            ...['image' => $file->store('images/members')],
        ]);

        return back()->with('success', 'Anggota baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('members.form', [

            'member' => $member,
            'member_categories' => MemberCategory::all(),
            'selectedCategory' => $member->member_category_id,
            'page_meta' => [
                'title' => 'Edit Anggota : ' . $member->name,
                'method' => 'put',
                'url' => route('members.update', $member),
            ]

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberRequest $request, Member $member)
    {
        if ($request->hasFile('image')) {

            Storage::delete($member->image);

            $file = $request->file('image')->store('image/members');
        } else {

            $file = $member->image;
        }

        $member->update([

            'nim' => $request->nim,
            'name' => $request->name,
            'image' => $file,
            'major' => $request->major,
            'position' => $request->position,
            'member_category_id' => $request->member_category_id,

        ]);

        return to_route('members.index')->with('success',  $request->name . ' : berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {

        // dd($member);

        $member->delete();

        return to_route('members.index')->with('success', $member->name . ' : berhasil dihapus');
    }

    public function bulkDelete(Request $request)
    {
        // return dd($request->ids);
        $ids = $request->ids;

        if (is_array($ids) && count($ids) > 0) {
            Member::whereIn('id', $ids)->delete();
            return redirect()->back()->with('success', 'Anggota terpilih berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Tidak ada anggota yang terhapus.');
    }
}
