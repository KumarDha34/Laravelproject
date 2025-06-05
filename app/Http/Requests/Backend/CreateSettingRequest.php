<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CreateSettingRequest extends FormRequest
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
            'website_title' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|size:10', // or use regex
            'email' => 'required|email|max:255',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'youtube' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
            'google_map' => 'nullable|string',
            'logo_top' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'logo_bottom' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,ico|max:2048',
        ];
    }
}