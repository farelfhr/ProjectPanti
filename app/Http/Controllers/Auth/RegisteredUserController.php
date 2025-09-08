<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:user,panti'],
            'panti_name' => ['required_if:role,panti', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'is_admin' => false, // Pastikan user baru bukan admin
        ]);

        // Jika user mendaftar sebagai panti, buat data panti
        if ($request->role === 'panti' && $request->panti_name) {
            \App\Models\Panti::create([
                'user_id' => $user->id,
                'nama' => $request->panti_name,
                'alamat' => 'Alamat belum diisi',
                'kecamatan' => 'Belum diisi',
                'jumlah_anak' => 0,
                'kapasitas' => 0,
                'status' => 'pending',
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        // Redirect berdasarkan role
        if ($user->isPanti()) {
            return redirect(route('panti.setup', absolute: false))
                ->with('success', 'Registrasi berhasil! Silakan lengkapi data panti.');
        }

        return redirect(route('dashboard', absolute: false))
            ->with('success', 'Registrasi berhasil! Selamat datang di aplikasi.');
    }
}
