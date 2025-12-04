<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'name' => 'Cardiology',
            'description' => 'Heart related treatments'
        ]);

        Department::create([
            'name' => 'Neurology',
            'description' => 'Brain and nervous system'
        ]);

        Department::create([
            'name' => 'Orthopedics',
            'description' => 'Bones and joints'
        ]);
    }
}
