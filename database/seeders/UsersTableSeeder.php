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
                'name' => 'Trưởng Khoa',
                'email' => 'truongkhoa@example.com',
                'password' => Hash::make('truongkhoa'),
                'role' => 'trưởng khoa',
            ],
            [
                'name' => 'Giáo Vụ',
                'email' => 'giaovu@example.com',
                'password' => Hash::make('giaovu'),
                'role' => 'giáo vụ',
            ],
            [
                'name' => 'Giáo Viên',
                'email' => 'giaovien@example.com',
                'password' => Hash::make('giaovien'),
                'role' => 'giáo viên',
            ],
            [
                'name' => 'Sinh Viên 1',
                'email' => 'sinhvien1@example.com',
                'password' => Hash::make('sinhvien1'),
                'role' => 'sinh viên',
            ],
            [
                'name' => 'Sinh Viên 2',
                'email' => 'sinhvien2@example.com',
                'password' => Hash::make('sinhvien2'),
                'role' => 'sinh viên',
            ],
            // Thêm nhiều dòng dữ liệu khác nếu cần
        ]);
    }
}
