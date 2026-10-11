<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'AriefNi',
            'email' => 'nextpeopleone@gmail.com',
            'username' => 'arief',
            'is_staff' => true,
            'password' => Hash::make('rahasia'),
        ]);

        User::factory()->create([
            'name' => 'Arief2Ni',
            'email' => 'dinoglacier1st@gmail.com',
            'username' => 'arief2',
            'is_staff' => true,
            'password' => Hash::make('rahasia'),
        ]);

        // Buat 3 mapel
        $subjects = ['Pemrograman Dasar', 'Sistem Operasi', 'Matematika'];
        foreach ($subjects as $subjectName) {
            Subject::firstOrCreate(['name' => $subjectName], ['is_active' => true]);
        }

        // Isi soal & jawaban asli lewat seeder terpisah
        $this->call(QuestionAnswerSeeder::class);
    }
}
