<?php

namespace App\Providers\Servise;

use App\Models\Customer;

class CustomerService extends BaseServices
{
    protected function getModel():mixed
    {
        return Customer::class;
    }
}
