<?php

namespace App\Providers\Servise;

use App\Models\Customer;
use App\Models\Invoice;

class CustomerService extends BaseServices
{
    protected function getModel():mixed
    {
        return Customer::class;
    }
}
