<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class lophocSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            [
                'CourseName' => 'Phân tích thiết kế',
                'NamHoc'=>"2023/2024",
                'HocKy'=>"2",
                'instructor_id' => '3',
            ]
        ]);
    }
}
