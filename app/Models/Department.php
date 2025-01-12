<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /** @use HasFactory<\Database\Factories\DepartmentFactory> */
    use HasFactory;

    protected $guarded = ['id'];
    
    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }
    
    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }
}
