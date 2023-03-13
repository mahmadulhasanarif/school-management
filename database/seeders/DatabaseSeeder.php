<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Designation;
use App\Models\ExamType;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Admin::factory(1)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RolePermissionSedder::class);
        $this->call(StateSeeder::class);


        $this->call(AllDataSeeder::class);
    }
}
