<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Parvez',
                'email' => 'parvez@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'), // Gunakan bcrypt
                'kode_dept' => 'IT',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Shauma',
                'email' => 'shauma@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('321'),
                'kode_dept' => 'HRD',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
