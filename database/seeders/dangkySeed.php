<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class dangkySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('enrollments')->insert([
            [
                'course_id' => '1',
                'student_id' => '20050056',
            ],
            [
                'course_id' => '1',
                'student_id' => '20050057',
            ]
        ]);
    }
}
