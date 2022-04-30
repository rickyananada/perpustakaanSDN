<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = array(
            [
                'name' => 'Administrator',
                'userId' => 'admin123',
                'gender' => 'male',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'address' => '',
                'password' => Hash::make('password'),
                'created_at' => now(),
            ],
            [
                'name' => 'Kepala Sekolah Mamat',
                'userId' => 'simamat123',
                'gender' => 'male',
                'email' => 'mamat@gmail.com',
                'role' => 'kepsek',
                'address' => '',
                'password' => Hash::make('password'),
                'created_at' => now(),
            ],
            [
                'name' => 'Andi Gultom',
                'userId' => 'andi123',
                'gender' => 'male',
                'email' => 'andi@gmail.com',
                'role' => 'siswa',
                'address' => 'Jalanan',
                'password' => Hash::make('password'),
                'created_at' => now(),
            ]
        );
        foreach($data AS $d){
            User::create([
                'name' => $d['name'],
                'userId' => $d['userId'],
                'gender' => $d['gender'],
                'email' => $d['email'],
                'role' => $d['role'],
                'address' => $d['address'],
                'password' => $d['password'],
                'created_at' => $d['created_at'],
            ]);
        }
    }
}
