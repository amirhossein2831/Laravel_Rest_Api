<?php

namespace App\Http\Requests;

use App\Rules\CustomerExistRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateInvoiceRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        if ($this->isMethod('PUT')) {
            $rules = [
                'customerId' => ['required', new CustomerExistRule()],
                'amount' => 'required|numeric|min:100',
                'status' => ['required', Rule::in('P', 'p', 'V', 'v', 'B', 'b')],
                'billedDate' => 'required|date_format:Y-m-d H:i:s',
                'paidDate' => 'nullable|date_format:Y-m-d H:i:s'
            ];
        } else
            $rules = [
                'customerId' => ['sometimes', 'required', new CustomerExistRule()],
                'amount' => 'sometimes|required|numeric|min:100',
                'status' => ['sometimes', 'required', Rule::in('P', 'p', 'V', 'v', 'B', 'b')],
                'billedDate' => 'sometimes|required|date_format:Y-m-d H:i:s',
                'paidDate' => 'sometimes|nullable|date_format:Y-m-d H:i:s'
            ];
        return $rules;
    }

    protected function prepareForValidation(): void
    {
        if ($this->customerId)
            $this->merge(['customer_id' => $this->customerId]);
        if ($this->billedDate)
            $this->merge(['billed_date' => $this->billedDate]);
        if ($this->customerId)
            $this->merge(['paid_date' => $this->paidDate]);
    }
}
