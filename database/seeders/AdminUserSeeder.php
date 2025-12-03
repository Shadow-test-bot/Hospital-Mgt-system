<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Doctor;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name' => 'Admin',
            'password' => Hash::make('admin'),
            'usertype' => '1',
        ]);

        Doctor::firstOrCreate([
            'name' => 'Dr. John Doe',
        ], [
            'phone' => '1234567890',
            'room' => '101',
            'speciality' => 'Cardiology',
            'image' => 'doctorimage/default.jpg',
        ]);

        Doctor::firstOrCreate([
            'name' => 'Dr. Jane Smith',
        ], [
            'phone' => '0987654321',
            'room' => '102',
            'speciality' => 'Neurology',
            'image' => 'doctorimage/default.jpg',
        ]);
    }
}