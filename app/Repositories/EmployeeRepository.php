<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Interfaces\EmployeeRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function getAll(): Collection
    {
        return Employee::all();
    }

    public function getById(int $id): ?Employee
    {
        return Employee::with('tasks')->find($id);
    }

    public function getTasksByEmployee(int $employeeId): Collection
    {
        return DB::transaction(function () use ($employeeId) {
            $employee = Employee::find($employeeId);

            if (!$employee) {
                return collect(); // Boş bir koleksiyon döndür
            }

            return $employee->tasks;
        });
    }
}
