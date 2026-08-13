<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Arief',
            'email' => 'nextpeopleone@gmail.com',
            'username' => 'arief',
            'is_staff' => true,
            'password' => Hash::make('rahasia'),
        ]);

        // 2. PANGGIL QUESTION SEEDER DI SINI
        $this->call([
            QuestionSeeder::class,
        ]);
    }
}
