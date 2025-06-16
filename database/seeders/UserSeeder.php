<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    protected static ?string $password = 'admin123';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create ([
            'name' => 'Ferdi Dwana',
            'email' => 'ferdi@gmail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'is_admin' => true,
            'remember_token' => Str::random(10),
        ],
        [
            'name' => 'Farel Fathir',
            'email' => 'ferdi@gmail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'is_admin' => true,
            'remember_token' => Str::random(10),
        ],
        [
            'name' => 'Reyhan Akbar',
            'email' => 'ferdi@gmail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'is_admin' => true,
            'remember_token' => Str::random(10),
        ]);

       User::factory(100)->create(); 
    }
}
