<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function departments()
    {
        return $this->belongsToMany(Department::class,'employee_department');
    }

    public function salaries()
    {
        return $this->hasManyThrough(Salary::class, Department::class);
    }
}
