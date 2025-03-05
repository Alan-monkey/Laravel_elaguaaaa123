<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);




        //  código automatiza la ejecución del seeder UserSeeder, 
        // asegurando que los datos base de usuarios sean insertados al ejecutar php artisan db:seed.
        $this->call(UserSeeder::class);
    }
}
