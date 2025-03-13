<?php

namespace App\Interfaces;

use App\DTOs\TaskDTO;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

interface TaskRepositoryInterface
{
    public function create($data): Task;
    public function getAll(): Collection;
    public function getById(int $id): ?Task;
    public function update(int $id, array $data): ?Task;
    public function updateStatus(int $id, string $status): ?Task;
}

