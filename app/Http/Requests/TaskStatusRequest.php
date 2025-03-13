<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskStatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
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
            'status.required' => 'Görev durumu belirtilmelidir.',
            'status.in' => 'Geçersiz görev durumu. Sadece: pending, in_progress veya completed değerleri kabul edilir.',
        ];
    }
}
