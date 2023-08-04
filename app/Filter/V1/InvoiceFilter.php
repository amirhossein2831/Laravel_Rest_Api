<?php

namespace App\Filter\V1;

use App\Filter\ApiFilter;

class InvoiceFilter extends ApiFilter
{

    protected array $safeParam  =[
        'customerId' => ['eq','gt','lt'],
        'amount' =>['eq','gt','lt'],
        'status' => ['eq'],
        'billedDate' =>['eq','gt','lt'],
        'paidDate' =>['eq','gt','lt'],
    ];
    protected array $columnMap  =[
        'customerId' => 'customer_id',
        'billedDate' =>'billed_date',
        'paidDate' =>'paid_date',
    ];
}
