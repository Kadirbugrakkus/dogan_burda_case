<?php

namespace App\Http\Controllers\Api;

use App\Services\EmployeeService;
use Illuminate\Http\JsonResponse;
use Exception;

class EmployeeController extends Controller
{
    private EmployeeService $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index(): JsonResponse
    {
        try {
            $employees = $this->employeeService->getAll();

            if ($employees->isEmpty()) {
                return response()->json([
                    'message' => 'Employees not found!',
                    'status' => false
                ], 404);
            }

            return response()->json([
                'message' => 'Employees listed successfully',
                'status' => true,
                'data' => $employees
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while fetching employees!',
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            $employee = $this->employeeService->getById($id);

            if (!$employee) {
                return response()->json([
                    'message' => 'Employee not found!',
                    'status' => false
                ], 404);
            }

            return response()->json([
                'message' => 'Employee found successfully',
                'status' => true,
                'data' => $employee
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while fetching the employee!',
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getTasksByEmployee(int $id): JsonResponse
    {
        try {
            $tasks = $this->employeeService->getTasksByEmployee($id);

            if ($tasks->isEmpty()) {
                return response()->json([
                    'message' => 'No tasks found for this employee!',
                    'status' => false
                ], 404);
            }

            return response()->json([
                'message' => 'Tasks retrieved successfully',
                'status' => true,
                'data' => $tasks
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while fetching tasks!',
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}


