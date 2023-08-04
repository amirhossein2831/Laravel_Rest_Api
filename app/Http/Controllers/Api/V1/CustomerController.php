<?php

namespace App\Http\Controllers\Api\V1;

use App\Filter\V1\CustomerFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\V1\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $filter = new CustomerFilter();
        $filterItem = $filter->transform($request);
        $customers = Customer::where($filterItem);
        $includeInvoice = $request->query('includeInvoices');

        $customers = $includeInvoice ? $customers->with("invoices") : $customers;

        return CustomerResource::collection($customers->paginate(25)->appends($request->query()));
    }

    /**
     * Display the specified resource.
     *
     * @param Customer $customer
     * @return CustomerResource
     */
    public function show(Customer $customer)
    {
        $includeInvoice = \request()->query('includeInvoices');
        $customer = $includeInvoice ? $customer->loadMissing("invoices") : $customer;

        return CustomerResource::make($customer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCustomerRequest $request
     * @return void
     */
    public function store(StoreCustomerRequest $request)
    {
        return Customer::create($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCustomerRequest $request
     * @param Customer $customer
     * @return JsonResponse
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());
        return \response()->json(['massage' => 'update successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Customer $customer
     * @return JsonResponse
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return \response()->json(['massage'=>'deleted successfully']);
    }
}
