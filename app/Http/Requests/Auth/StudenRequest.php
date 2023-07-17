<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StudenRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:50',
            'school' => 'required|string|max:50',
            'number_identity' => 'required|digits:5',
            'gender' => 'required|digits:1',
            'previous_save' => 'required|string|max:50',
            'date_Join' => 'required|Date',
            'birth_date' => 'required|Date',
            'identity_id'=>'required|integer',
            'nationality_id'=>'required|integer',
            'guardian_id'=>'required|integer',
            'quran_episodes_id'=>'required|integer',
            'users_id'=>'required|integer',
                // 'image'=>'required|string'
        ];
    }
}
