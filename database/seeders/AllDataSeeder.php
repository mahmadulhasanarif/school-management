<?php

namespace Database\Seeders;

use App\Models\Designation;
use App\Models\ExamType;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Student Class Start
        StudentClass::factory()->create([
            'name'=>'Class One'
        ]);

        StudentClass::factory()->create([
            'name'=>'Class Two'
        ]);

        StudentClass::factory()->create([
            'name'=>'Class Three'
        ]);

        StudentClass::factory()->create([
            'name'=>'Class Four'
        ]);

        StudentClass::factory()->create([
            'name'=>'Class Five'
        ]);

        StudentClass::factory()->create([
            'name'=>'Class Six'
        ]);

        StudentClass::factory()->create([
            'name'=>'Class Seven'
        ]);

        StudentClass::factory()->create([
            'name'=>'Class Eight'
        ]);
 
        StudentClass::factory()->create([
            'name'=>'Class Nine'
        ]);
  
        StudentClass::factory()->create([
            'name'=>'Class Ten'
        ]);
        // Student Class End


        // Student Year Start
        StudentYear::factory()->create([
            'name'=>"2022"
        ]);
        StudentYear::factory()->create([
            'name'=>"2023"
        ]);
        StudentYear::factory()->create([
            'name'=>"2024"
        ]);
        StudentYear::factory()->create([
            'name'=>"2025"
        ]);
         // Student Year End



        // Student Group Start
        StudentGroup::factory()->create([
            'name'=>"Science"
        ]);
        StudentGroup::factory()->create([
            'name'=>"Arts"
        ]);
        StudentGroup::factory()->create([
            'name'=>"Commerce"
        ]);
        StudentGroup::factory()->create([
            'name'=>"Technical"
        ]);
        StudentGroup::factory()->create([
            'name'=>"Primary"
        ]);
        // Student Group End

        // Student Shift Start
        StudentShift::factory()->create(['name'=>'1st Shift']);
        StudentShift::factory()->create(['name'=>'2nd Shift']);
        StudentShift::factory()->create(['name'=>'3rd Shift']);
         // Student Shift End

        // Student Fee Category Start
        FeeCategory::factory()->create(['name'=>'Registration Fee']);
        FeeCategory::factory()->create(['name'=>'Monthly Fee']);
        FeeCategory::factory()->create(['name'=>'Exam Fee']);
        FeeCategory::factory()->create(['name'=>'Other Fee']);
        // Student Fee Category End

        // Student Fee Category Amount Start
        FeeCategoryAmount::factory()->create([
            'fee_category_id'=> 1,
            'class_id'=> 1,
            'amount'=>250
        ]);
        FeeCategoryAmount::factory()->create([
            'fee_category_id'=> 1,
            'class_id'=> 2,
            'amount'=>250
        ]);
        FeeCategoryAmount::factory()->create([
            'fee_category_id'=> 1,
            'class_id'=> 3,
            'amount'=>300
        ]);
        FeeCategoryAmount::factory()->create([
            'fee_category_id'=> 1,
            'class_id'=> 4,
            'amount'=>300
        ]);
        FeeCategoryAmount::factory()->create([
            'fee_category_id'=> 1,
            'class_id'=> 5,
            'amount'=>400
        ]);
        FeeCategoryAmount::factory()->create([
            'fee_category_id'=> 1,
            'class_id'=> 6,
            'amount'=>500
        ]);
        FeeCategoryAmount::factory()->create([
            'fee_category_id'=> 1,
            'class_id'=> 7,
            'amount'=>500
        ]);
        FeeCategoryAmount::factory()->create([
            'fee_category_id'=> 1,
            'class_id'=> 8,
            'amount'=>600
        ]);
        FeeCategoryAmount::factory()->create([
            'fee_category_id'=> 1,
            'class_id'=> 9,
            'amount'=>1000
        ]);

        FeeCategoryAmount::factory()->create([
            'fee_category_id'=> 2,
            'class_id'=> 1,
            'amount'=>100
        ]);
        FeeCategoryAmount::factory()->create([
            'fee_category_id'=> 2,
            'class_id'=> 2,
            'amount'=>100
        ]);
        FeeCategoryAmount::factory()->create([
            'fee_category_id'=> 2,
            'class_id'=> 3,
            'amount'=>150
        ]);
        FeeCategoryAmount::factory()->create([
            'fee_category_id'=> 2,
            'class_id'=> 4,
            'amount'=>200
        ]);
        FeeCategoryAmount::factory()->create([
            'fee_category_id'=> 2,
            'class_id'=> 5,
            'amount'=>250
        ]);
        FeeCategoryAmount::factory()->create([
            'fee_category_id'=> 2,
            'class_id'=> 6,
            'amount'=>250
        ]);
        FeeCategoryAmount::factory()->create([
            'fee_category_id'=> 2,
            'class_id'=> 7,
            'amount'=>300
        ]);
        FeeCategoryAmount::factory()->create([
            'fee_category_id'=> 2,
            'class_id'=> 8,
            'amount'=>350
        ]);
        FeeCategoryAmount::factory()->create([
            'fee_category_id'=> 2,
            'class_id'=> 9,
            'amount'=>400
        ]);
        FeeCategoryAmount::factory()->create([
            'fee_category_id'=> 2,
            'class_id'=> 10,
            'amount'=>500
        ]);
        // Student Fee Category Amount End


        // Student Exam Type Start
        ExamType::factory()->create(['name'=>'Final Exam']);
        ExamType::factory()->create(['name'=>'Mid Exam']);
        ExamType::factory()->create(['name'=>'Monthly Exam']);
        ExamType::factory()->create(['name'=>'Weakly Exam']);
        // Student Exam Type End

        // Student Subject Start
        SchoolSubject::factory()->create(['name'=>'Bangla']);
        SchoolSubject::factory()->create(['name'=>'English']);
        SchoolSubject::factory()->create(['name'=>'Math']);
        SchoolSubject::factory()->create(['name'=>'Science']);
        SchoolSubject::factory()->create(['name'=>'Islam']);
        SchoolSubject::factory()->create(['name'=>'Social Science']);
         // Student Subject End

        // Designation Start
        Designation::factory()->create(['name'=>'Head Teacher']);
        Designation::factory()->create(['name'=>'Assistant Head Teacher']);
        Designation::factory()->create(['name'=>'Teacher']);
    }
}
