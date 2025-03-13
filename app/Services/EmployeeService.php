<?php

namespace App\Services;

use App\DTOs\EmployeeDTO;
use App\Interfaces\EmployeeRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EmployeeService
{
    private EmployeeRepositoryInterface $employeeRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function getAll(): Collection
    {
        return $this->employeeRepository->getAll();
    }

    public function getById(int $id): ?EmployeeDTO
    {
        $employee = $this->employeeRepository->getById($id);

        return $employee ? EmployeeDTO::fromModel($employee) : null;
    }

    public function getTasksByEmployee(int $employeeId): Collection
    {
        return $this->employeeRepository->getTasksByEmployee($employeeId);
    }
}

