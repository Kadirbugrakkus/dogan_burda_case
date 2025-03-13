<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
{
    /**
     * Kullanıcının bu isteği yapmaya yetkili olup olmadığını belirler.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Geçerli olan doğrulama kurallarını döndürür.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'employee_id' => 'required|exists:employees,id',
            'title' => 'required|string|max:255',
            'status' => [
                'required',
                Rule::in(['pending', 'in_progress', 'completed'])
            ],
        ];
    }

    /**
     * Özelleştirilmiş hata mesajlarını döndürür.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'employee_id.required' => 'Çalışan ID alanı zorunludur.',
            'employee_id.exists' => 'Seçilen çalışan sistemde kayıtlı değil.',

            'title.required' => 'Görev başlığı alanı zorunludur.',
            'title.string' => 'Görev başlığı metinsel olmalıdır.',
            'title.max' => 'Görev başlığı en fazla 255 karakter olabilir.',

            'status.required' => 'Görev durumu belirtilmelidir.',
            'status.in' => 'Geçersiz görev durumu. Sadece: pending, in_progress veya completed değerleri kabul edilir.',
        ];
    }
}
