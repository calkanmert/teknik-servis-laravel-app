<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DeviceRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'device_type' => ['required', 'exists:device_types,id'],
            'device_brand' => ['required', 'exists:device_brands,id'],
            'model' => ['required'],
            'includes' => ['nullable'],
            'problems' => ['required'],
            'customer_note' => ['nullable'],
            'employeee_note' => ['nullable'],
        ];
    }
}
