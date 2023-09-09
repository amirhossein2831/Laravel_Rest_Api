<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Resources\V1\InvoiceResource;
use App\Providers\Servise\InvoiceService;
use App\Http\Requests\BulkStoreRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Filter\V1\InvoiceFilter;
use Illuminate\Http\Request;
use App\Models\Invoice;
use function response;
use Arr;

class InvoiceController extends Controller
{
    protected InvoiceService $service;
    public function __construct(InvoiceService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $filter = new InvoiceFilter();
        $filterItem = $filter->transform($request);

        $invoices = $this->service->getAll($filterItem);

        return InvoiceResource::collection($invoices->paginate(25)->appends($request->query()));

    }

    /**
     * Display the specified resource.
     *
     * @param Invoice $invoice
     * @return Invoice
     */
    public function show(Invoice $invoice)
    {
        return InvoiceResource::make($invoice);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreInvoiceRequest $request
     * @return void
     */
    public function store(StoreInvoiceRequest $request)
    {
        return Invoice::create($request->all());
    }

    public function bulkStore(BulkStoreRequest $request)
    {
        $bulk = collect($request->all())->map(function ($arr,$value){
            return Arr::except($arr,['customerId','billedDate','paidDate']);
        });
        Invoice::insert($bulk->toArray());
        return response()->json(['message'=>'success fully insert']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateInvoiceRequest $request
     * @param Invoice $invoice
     * @return JsonResponse
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $invoice->update($request->all());
        return response()->json(['massage'=> 'updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Invoice $invoice
     * @return JsonResponse
     */
    public function destroy(Invoice $invoice)
    {
        $user = Auth::user();
        $can = !is_null($user) && $user->tokenCan('delete');
        if (!$can) {
            return response()->json(['massage'=>'This action is unauthorized.']);
        }
        $invoice->delete();
        return response()->json(['massage'=>'deleted successfully.']);
    }
}
