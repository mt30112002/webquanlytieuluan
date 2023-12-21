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
        $this->call([
            UsersTableSeeder::class,
            lophocSeed::class,
            dangkySeed::class,
            // Thêm các Seeder khác nếu có
        ]);
    }
}
