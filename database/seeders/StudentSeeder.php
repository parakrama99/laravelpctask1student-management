<?php

namespace Database\Seeders;

use App\Models\Student; // Import your model
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::factory(200)->create(); // Create 100 fake students
    }
}