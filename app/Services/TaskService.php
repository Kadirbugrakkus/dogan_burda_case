<?php

namespace App\Services;

use App\DTOs\TaskDTO;
use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskService
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function store($data): Task
    {
        return $this->taskRepository->create($data->toArray());
    }

    public function update(int $id, TaskDTO $taskDTO): ?Task
    {
        return $this->taskRepository->update($id, $taskDTO->toArray());
    }

    public function updateStatus(int $id, TaskDTO $taskDTO): ?Task
    {
        return $this->taskRepository->updateStatus($id, $taskDTO->status);
    }

    public function getAll(): Collection
    {
        return $this->taskRepository->getAll();
    }

    public function getById(int $id): ?Task
    {
        return $this->taskRepository->getById($id);
    }
}


