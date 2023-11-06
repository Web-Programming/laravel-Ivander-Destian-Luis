<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\prodi;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      Prodi::create(
        [
            "name" => "Teknik Informatika",
        ]
        );

        Prodi::create(
            [
                "name" => "Manajemen Informatika",
            ]
        );

        Prodi::create(
            [
                "name" => "Sistem Informasi",
            ]
        );
    }
}
