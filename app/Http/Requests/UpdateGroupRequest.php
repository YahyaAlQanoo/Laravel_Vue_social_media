<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateGroupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $group = $this->route('group');

        return $group->isAdmin(Auth::id());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'auto_approval' => ['required', 'boolean'],
            'about' => ['nullable']
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'about' => nl2br($this->about),
        ]);
    }

}
