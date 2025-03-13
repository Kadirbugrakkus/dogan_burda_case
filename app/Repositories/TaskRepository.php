<?php

namespace App\Repositories;

use App\Models\Task;
use App\Interfaces\TaskRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class TaskRepository implements TaskRepositoryInterface
{
    public function create($data): Task
    {
        return DB::transaction(function () use ($data) {
            return Task::create($data);
        });
    }

    public function getAll(): Collection
    {
        return Task::all();
    }

    public function getById(int $id): ?Task
    {
        return Task::with('employee')->find($id);
    }

    public function update(int $id, array $data): ?Task
    {
        return DB::transaction(function () use ($id, $data) {
            $task = Task::find($id);
            if (!$task) {
                return null;
            }

            $task->update($data);
            return $task;
        });
    }

    public function updateStatus(int $id, string $status): ?Task
    {
        return DB::transaction(function () use ($id, $status) {
            $task = Task::find($id);
            if (!$task) {
                return null;
            }

            $task->update(['status' => $status]);
            return $task;
        });
    }
}

