<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {
    protected $fillable = ['employee_id', 'title', 'status'];

    public function employee() {
        return $this->belongsTo(Employee::class);
    }
}

