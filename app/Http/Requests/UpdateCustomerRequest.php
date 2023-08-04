<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        $user = $this->user();
        return !is_null($user) && $user->tokenCan('create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        if ($this->isMethod('PUT')) {
            $rules = [
                'name' => 'required',
                'type' => ['required', Rule::in(["P", "p", "B", 'b'])],
                'email' => 'required|email',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'postalCode' => 'required',
            ];
        } else
            $rules = [
                'name' => 'sometimes|required',
                'type' => ['sometimes', 'required', Rule::in(["P", "p", "B", 'b'])],
                'email' => 'sometimes|required|email',
                'address' => 'sometimes|required',
                'city' => 'sometimes|required',
                'state' => 'sometimes|required',
                'postalCode' => 'sometimes|required',
            ];
        return $rules;
    }

    protected function prepareForValidation(): void
    {
        if ($this->postalCode) {
            $this->merge(
                [
                    'postal_code' => $this->postalCode
                ]
            );
        }
    }
}
