<?php

namespace Database\Seeders;

use App\Models\College;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollegeAndDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $college = College::create([
            'name' => 'College of Engineering',
        ]);
        $college->departments()->create([
            'name' => 'Civil Engineering',
        ]);
        $college->departments()->create([
            'name' => 'Mechanical Engineering',
        ]);
        $college->departments()->create([
            'name' => 'Electronics Engineering',
        ]);
        $college->departments()->create([
            'name' => 'Electrical Engineering',
        ]);
        $college->departments()->create([
            'name' => 'Engineering Technology',
        ]);
    }
}
