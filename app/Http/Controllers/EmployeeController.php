<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $employees = [];
        if ($request->has('n')) {
            $n = $request->input('n');

            $employeesWithMaxSalary = Employee::join('employee_department', 'employee_department.employee_id', 'employees.id')
                ->join('departments', 'departments.id', 'employee_department.department_id')
                ->join('salaries', 'departments.id', 'salaries.department_id')
                ->select('employees.id as id', 'employees.name as name', DB::raw('max(salaries.amount) as max_salary'))
                ->groupBy('id')
                ->latest('max_salary')
                ->get()->map(function ($employee) {
                    return $employee;
                })->values();

            $nMaxSalary = $employeesWithMaxSalary
                ->pluck('max_salary')
                ->unique() // Ensure unique salary values
                ->sortDesc()
                ->values()
                ->get($n - 1);

            $employees = $employeesWithMaxSalary
                ->where('max_salary', $nMaxSalary);
        }
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
