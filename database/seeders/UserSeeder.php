<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'caio',
            'email' => "caiodjesus1@hotmail.com",
            'password' => bcrypt('123456'),
            'phone' => 1235484,
            'address' => "Rua sem saida n44, centro",
            'isAdmin' => false,
            'active' => true
        ]);

        User::create([
            'name' => 'admin',
            'email' => "admin@admin.com",
            'password' => bcrypt('654321'),
            'phone' => 1235484,
            'address' => "Rua sem saida n44, centro",
            'isAdmin' => true,
            'active' => true
        ]);

        User::create([
            'name' => 'teste',
            'email' => "teste@generico.com",
            'password' => bcrypt('teste123'),
            'phone' => 1235484,
            'address' => "Rua com saida n22, canto",
            'isAdmin' => false,
            'active' => true
        ]);
    }
}
