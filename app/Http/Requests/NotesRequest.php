<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotesRequest extends FormRequest
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
            'folder_id' => 'required|exists:folders,id',
            'name' => 'required',
            'type' => 'required|in:file,text',
            'file' => 'required_if:type,===,file',
            'content' => 'required_if:type,===,text',
            'is_shared' => 'required|boolean'

        ];
    }
}
