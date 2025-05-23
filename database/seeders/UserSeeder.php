<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Este código automatiza la creación de usuarios en la base de datos, útil para pruebas y desarrollo mas adelante
        // hare la inserciòn de datos manualmente 
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'username' => 'adminUser',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'status' => 'active',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Vendedor User',
                'username' => 'venderUser',
                'email' => 'vendedor@gmail.com',
                'role' => 'vendedor',
                'status' => 'active',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'User',
                'username' => 'user04',
                'email' => 'user@gmail.com',
                'role' => 'user',
                'status' => 'active',
                'password' => bcrypt('12345678'),
            ]
        ]);
    }
}
