<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            'type'  =>  'required',
            'tariff_id' =>  'required|exists:tariffs,id',
            'age'       =>  'required',
            'login' =>  'required|unique:users,login',
            'password'  =>  'required',
            'phone' =>  'required|unique:users,phone',
            'name'  =>  'required',
            'surname'   =>  'required',
            'school_id' =>  'required|exists:schools,id',
        ];
    }

    public function failedValidation( $validator)
    {
        throw new HttpResponseException(
            response()->json(['message' => $validator->errors()->first()],400)
        );
    }
}
