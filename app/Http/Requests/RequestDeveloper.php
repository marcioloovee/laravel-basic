<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class RequestDeveloper extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('post')) {
            return [
                'nome'                   => 'required|min:3|max:100|string',
                'sexo'                   => 'required|in:F,M',
                'hobby'                  => 'required|string',
                'idade'                  => 'required|integer|min:0|max:100',
                'dataNascimento'         => 'required|date'
            ];
        }

        if ($this->isMethod('put')) {
            return [
                'nome'                   => 'min:3|max:100|string',
                'sexo'                   => 'in:F,M',
                'hobby'                  => 'string',
                'idade'                  => 'integer|min:0|max:100',
                'dataNascimento'         => 'date'
            ];
        }
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json(['error'=>true,'data' => $errors], 202)
        );
    }
}
