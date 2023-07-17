<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class DailyBusinessRequest extends FormRequest
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
            'id_student'=>'required|integer',
            'id_atendances'=>'required|integer',
            'from_surah'=>'required|digits_between:1,3',
            'from_ayah'=>'required|digits_between:1,3',
            'to_surah'=>'required|digits_between:1,3',
            'to_ayah'=>'required|digits_between:1,3',
            'seve_or_ver'=>'required|digits:1',
        ];
    }
}
