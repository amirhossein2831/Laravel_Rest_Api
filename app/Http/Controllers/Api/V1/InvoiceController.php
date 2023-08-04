<?php

namespace App\Http\Controllers\Api\V1;

use App\Filter\V1\InvoiceFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Http\Resources\V1\InvoiceResource;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $filter = new InvoiceFilter();
        $filterItem = $filter->transform($request);
        $invoices = Invoice::where($filterItem);
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


    /**
     * Show the form for editing the specified resource.
     *
     * @param Invoice $invoice
     * @return Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateInvoiceRequest $request
     * @param Invoice $invoice
     * @return Response
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Invoice $invoice
     * @return Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
