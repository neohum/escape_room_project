<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'user_id' => 'required|string|min:3|max:255',
            'title' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:3|max:255',
            'image' => 'file|max:1024|mimes:jpeg,png,jpg',
            'prev_id' => 'required|string|min:3|max:255',
            'next_id' => 'required|string|min:3|max:255',
        ];
    }
}
