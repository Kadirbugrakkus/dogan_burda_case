<?php

namespace App\DTOs;

class TaskDTO
{
    public ?int $employee_id;
    public ?string $title;
    public string $status;

    public function __construct(?int $employee_id = null, ?string $title = null, string $status)
    {
        $this->employee_id = $employee_id;
        $this->title = $title;
        $this->status = $status;
    }

    public static function fromRequest($request): self
    {
        return new self(
            $request->employee_id,
            $request->title,
            $request->status
        );
    }

    /**
     * Güncelleme için DTO oluşturur.
     */
    public static function fromUpdateRequest($request): self
    {
        return new self(
            $request->employee_id ?? null,
            $request->title ?? null,
            $request->status ?? null
        );
    }

    /**
     * Sadece status güncellemesi için DTO oluşturur.
     */
    public static function fromStatusUpdateRequest($request): self
    {
        return new self(
            null,
            null,
            $request->status
        );
    }

    /**
     * DTO'yu array formatına çevirir.
     */
    public function toArray(): array
    {
        return [
            'employee_id' => $this->employee_id,
            'title' => $this->title,
            'status' => $this->status,
        ];
    }
}

