@extends('layouts.guest')
@section('content')
<div class="w-full max-w-md mx-auto bg-white rounded-2xl shadow-2xl p-8 md:p-10">
    <h2 class="text-3xl font-bold text-center text-black mb-10">Login</h2>
    <form method="POST" action="{{ route('login') }}" class="space-y-8">
        @csrf
        <div>
            <input id="email" name="email" type="email" required autofocus autocomplete="username" placeholder="Email" class="w-full px-6 h-14 rounded-lg border-2 border-[#41644A] focus:border-[#0D4715] focus:ring-[#41644A] text-black bg-[#F3F2EB] placeholder-gray-400 text-lg" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div>
            <input id="password" name="password" type="password" required autocomplete="current-password" placeholder="Password" class="w-full px-6 h-14 rounded-lg border-2 border-[#D0D5CB] focus:border-[#41644A] focus:ring-[#41644A] text-black bg-[#F3F2EB] placeholder-gray-400 text-lg" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="flex gap-6 mt-2">
            <button type="submit" class="flex-1 h-14 rounded-full font-bold text-white bg-[#41644A] hover:bg-[#0D4715] transition text-lg shadow">Login</button>
            <a href="{{ route('register') }}" class="flex-1 h-14 flex items-center justify-center rounded-full font-bold text-[#41644A] border-2 border-[#41644A] bg-white hover:bg-[#E9762B] hover:text-white text-lg transition shadow">Sign Up</a>
        </div>
        @if (Route::has('password.request'))
            <div class="text-right mt-2">
                <a class="text-base text-[#41644A] hover:underline" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            </div>
        @endif
    </form>
</div>
@endsection
