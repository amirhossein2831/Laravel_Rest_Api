<?php

namespace App\Providers\Servise;

use App\Models\Invoice;

class InvoiceService extends BaseServices
{

    protected function getModel():mixed
    {
        return Invoice::class;
    }
}
