<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KatDokumenStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => 'required|string|max:50',
            'deskripsi' => 'required|string|max:50'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nama.required' => 'Email is required!',
            'deskripsi.required' => 'Name is required!',
        ];
    }
}
