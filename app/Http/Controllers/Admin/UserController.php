<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(15);
        return view('admin.users.index', compact('users'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if (auth()->id() == $user->id && !$request->has('is_admin')) {
            return back()->with('error', 'Anda tidak dapat mencabut status admin dari akun Anda sendiri.');
        }

        $user->is_admin = $request->has('is_admin');
        $user->save();
        ActivityLog::create([
            'user_name' => auth()->user()->name,
            'action' => 'Edit User',
            'subject_type' => 'User',
            'subject_id' => $user->id,
            'description' => 'Nama: ' . $user->name,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Peran pengguna berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (auth()->id() == $user->id) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        ActivityLog::create([
            'user_name' => auth()->user()->name,
            'action' => 'Hapus User',
            'subject_type' => 'User',
            'subject_id' => $user->id,
            'description' => 'Nama: ' . $user->name,
        ]);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
