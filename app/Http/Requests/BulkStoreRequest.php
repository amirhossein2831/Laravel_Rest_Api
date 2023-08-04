<?php

namespace App\Http\Requests;

use App\Rules\CustomerExistRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BulkStoreRequest extends FormRequest
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
        return [
            '*.customerId' => ['required', new CustomerExistRule()],
            '*.amount' => 'required|numeric|min:100',
            '*.status' => ['required', Rule::in('P', 'p', 'V', 'v', 'B', 'b')],
            '*.billedDate' => 'required|date_format:Y-m-d H:i:s',
            '*.paidDate' => 'nullable|date_format:Y-m-d H:i:s'
        ];
    }
    protected function prepareForValidation():void
    {
        $date = [];
        foreach ($this->toArray() as $obj) {
            $obj['customer_id'] = $obj['customerId'] ?? null;
            $obj['billed_date'] = $obj['billedDate'] ?? null;
            $obj['paid_date'] = $obj['paidDate'] ?? null;
            $date[] = $obj;
        }
        $this->merge($date);
    }
}
