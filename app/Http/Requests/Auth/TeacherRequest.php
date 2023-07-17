<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'qualification' => 'required|string|max:70',
            'work' => 'required|string|max:100',
            'salary' => 'required|min:4',
            'teaching_years' => 'sometimes|date_format:Y-m-d',
            'center_they_work' => 'required|string|max:100',
            'address' => 'required|string|max:50',
            'identity_id'=>'required|integer',
            'number_identity' => 'required|digits_between:5,20',
            'gender' => 'required|digits:1',
            'nationality_id'=>'required|integer',
            'birth_date' => 'required|date_format:Y-m-d',
            'qualification_study_id'=>'required|integer',
            'users_id'=>'required|integer',
        ];
    }
}
