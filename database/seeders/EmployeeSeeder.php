<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder {
    public function run() {
        Employee::factory()->count(10)->create(); // 10 tane rastgele çalışan oluştur
    }
}
