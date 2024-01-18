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
        $roles = new RolesSeeder();
        $roles->run();
        $personas = new PersonasSeeder();
        $personas->run();
        $paginas = new PaginasSeeder();
        $paginas->run();
        $enlaces = new EnlacesSeeder();
        $enlaces->run();

    }
}
