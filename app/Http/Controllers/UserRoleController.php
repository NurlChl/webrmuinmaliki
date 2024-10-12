<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->paginate(10);
        $adminRoleId = Role::where('name', 'partner')->first()->id; 
        return view('users.index', compact('users', 'adminRoleId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('user_roles.index', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'role_id' => 'required|exists:roles,id',
            'user_id' => 'required|exists:users,id', // Pastikan user_id ada
        ]);
    
        // Ambil user berdasarkan user_id
        $user = User::find($validated['user_id']);
    
        // Debugging untuk memeriksa apakah user sudah memiliki role tersebut
        if ($user->roles()->where('id', $validated['role_id'])->exists()) {
            return redirect()->route('user_roles.index')->with('info', 'Role sudah ada untuk pengguna ini.');
        }
    
        // Coba melakukan attach dan tangkap kesalahan
        try {
            $user->roles()->attach($validated['role_id']);
        } catch (\Exception $e) {
            dd($e->getMessage()); // Tampilkan pesan kesalahan
        }
    
        return redirect()->route('user_roles.index')->with('success', 'Role berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $user)
    {
        // Ambil role_id dan user_id dari permintaan
        $roleId = $request->input('role_id');
        $userId = $request->input('user_id'); // Ambil user_id dari request

        // Cek jika user yang ingin dihapus adalah satu-satunya admin
        $adminCount = User::whereHas('roles', function($query) {
            $query->where('name', 'admin');
        })->count();

        // Ambil user berdasarkan user_id
        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('user_roles.index')->withErrors(['msg' => 'User tidak ditemukan.']);
        }

        // Pastikan jika hanya ada satu admin, tidak bisa dihapus
        if ($adminCount <= 1 && $user->hasRole('admin')) {
            return redirect()->route('user_roles.index')->withErrors(['msg' => 'Tidak dapat menghapus satu-satunya admin.']);
        }

        // Menghapus role tertentu dari user
        if ($roleId) {
            // Periksa apakah user memiliki role ini sebelum mencoba untuk menghapus
            if ($user->roles()->where('id', $roleId)->exists()) {
                $user->roles()->detach($roleId); // Hapus role dari user
                return redirect()->route('user_roles.index')->with('success', 'Role berhasil dihapus!');
            } else {
                return redirect()->route('user_roles.index')->withErrors(['msg' => 'Role tidak ditemukan untuk pengguna ini.']);
            }
        }

        return redirect()->route('user_roles.index')->withErrors(['msg' => 'Role tidak ditemukan.']);
    }
}
