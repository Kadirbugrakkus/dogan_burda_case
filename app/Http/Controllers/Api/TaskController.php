<?php

namespace App\Http\Controllers\Api;

use App\DTOs\TaskDTO;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\TaskStatusRequest;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Exception;

class TaskController extends Controller
{
    private TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $tasks = $this->taskService->getAll();

            if ($tasks->isEmpty()) {
                return response()->json([
                    'message' => 'Tasks not found',
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
                'message' => 'An error occurred while fetching tasks',
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $task = $this->taskService->getById($id);

            if (!$task) {
                return response()->json([
                    'message' => 'Task not found',
                    'status' => false
                ], 404);
            }

            return response()->json([
                'message' => 'Task retrieved successfully',
                'status' => true,
                'data' => $task
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while fetching the task',
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @param TaskRequest $request
     * @return JsonResponse
     */
    public function store(TaskRequest $request): JsonResponse
    {
        try {
            $taskDTO = TaskDTO::fromRequest($request);
            $task = $this->taskService->store($taskDTO);

            return response()->json([
                'message' => 'Task created successfully',
                'status' => true,
                'data' => $task
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while creating the task',
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @param TaskRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(TaskRequest $request, int $id): JsonResponse
    {
        try {
            $taskDTO = TaskDTO::fromUpdateRequest($request);
            $task = $this->taskService->update($id, $taskDTO);

            if (!$task) {
                return response()->json([
                    'message' => 'Task not found',
                    'status' => false
                ], 404);
            }

            return response()->json([
                'message' => 'Task updated successfully',
                'status' => true,
                'data' => $task
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while updating the task',
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @param TaskStatusRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function statusUpdate(TaskStatusRequest $request, int $id): JsonResponse
    {
        try {
            $taskDTO = TaskDTO::fromStatusUpdateRequest($request);
            $task = $this->taskService->updateStatus($id, $taskDTO);

            if (!$task) {
                return response()->json([
                    'message' => 'Task not found',
                    'status' => false
                ], 404);
            }

            return response()->json([
                'message' => 'Task updated successfully',
                'status' => true,
                'data' => $task
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while updating the task status',
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}

