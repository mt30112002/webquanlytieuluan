<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Thêm dữ liệu mẫu
        DB::table('users')->insert([
            [
                'id' => '1',
                'name' => 'Trưởng Khoa',
                'email' => 'truongkhoa@example.com',
                'password' => Hash::make('truongkhoa'),
                'role' => 'trưởng khoa',
            ],
            [
                'id' => '2',
                'name' => 'Giáo Vụ',
                'email' => 'giaovu@example.com',
                'password' => Hash::make('giaovu'),
                'role' => 'giáo vụ',
            ],
            [
                'id' => '3',
                'name' => 'Giáo Viên',
                'email' => 'giaovien@example.com',
                'password' => Hash::make('giaovien'),
                'role' => 'giáo viên',
            ],
            [
                'id' => '20050056',
                'name' => 'Sinh Viên 1',
                'email' => 'sinhvien1@example.com',
                'password' => Hash::make('sinhvien1'),
                'role' => 'sinh viên',
            ],
            [
                'id' => '20050057',
                'name' => 'Sinh Viên 2',
                'email' => 'sinhvien2@example.com',
                'password' => Hash::make('sinhvien2'),
                'role' => 'sinh viên',
            ],
        ]);
    }
}
