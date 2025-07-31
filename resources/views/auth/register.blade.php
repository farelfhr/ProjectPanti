@extends('layouts.guest')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="role" :value="__('Daftar Sebagai')" />
            <select id="role" name="role" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required onchange="togglePantiField()">
                <option value="">{{ __('Pilih Role') }}</option>
                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>{{ __('User Biasa') }}</option>
                <option value="panti" {{ old('role') == 'panti' ? 'selected' : '' }}>{{ __('Panti Asuhan') }}</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Field untuk nama panti (hanya muncul jika role panti dipilih) -->
        <div id="panti-field" class="mt-4" style="display: none;">
            <x-input-label for="panti_name" :value="__('Nama Panti Asuhan')" />
            <x-text-input id="panti_name" class="block mt-1 w-full" type="text" name="panti_name" :value="old('panti_name')" autocomplete="organization" />
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Masukkan nama panti asuhan yang akan Anda kelola</p>
            <x-input-error :messages="$errors->get('panti_name')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        function togglePantiField() {
            const roleSelect = document.getElementById('role');
            const pantiField = document.getElementById('panti-field');
            const pantiNameInput = document.getElementById('panti_name');
            
            if (roleSelect.value === 'panti') {
                pantiField.style.display = 'block';
                pantiNameInput.required = true;
            } else {
                pantiField.style.display = 'none';
                pantiNameInput.required = false;
                pantiNameInput.value = '';
            }
        }

        // Check on page load if role is already selected
        document.addEventListener('DOMContentLoaded', function() {
            togglePantiField();
        });
    </script>
@endsection
