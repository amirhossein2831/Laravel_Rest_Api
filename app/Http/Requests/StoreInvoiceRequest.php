<?php

namespace App\Http\Requests;

use App\Rules\CustomerExistRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreInvoiceRequest extends FormRequest
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
        return [
            'customerId' => ['required', new CustomerExistRule()],
            'amount' => 'required|numeric|min:100',
            'status' => ['required', Rule::in('P', 'p', 'V', 'v', 'B', 'b')],
            'billedDate' => 'required|date_format:Y-m-d H:i:s',
            'paidDate' => 'nullable|date_format:Y-m-d H:i:s'
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge(
            [
                'customer_id' => $this->customerId,
                'billed_date' => $this->billedDate,
                'paid_date' => $this->paidDate
            ]
        );
    }
}
