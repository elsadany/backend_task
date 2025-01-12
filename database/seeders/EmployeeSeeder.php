<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Employee::all();
        $departments = Department::all();
    
        foreach ($employees as $employee) {
            $employee->departments()->attach(
                $departments->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
        
    }
}
