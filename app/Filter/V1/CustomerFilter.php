<?php

namespace App\Filter\V1;

use App\Filter\ApiFilter;

class CustomerFilter extends ApiFilter
{
    protected array $safeParam  =[
        'name' => ['eq'],
        'type' => ['eq'],
        'email' =>['eq'],
        'address' =>['eq'],
        'city' =>['eq'],
        'state' => ['eq'],
        'postalCode' =>['eq','lt','gt'],
    ];
    protected array $columnMap  =[
        'postalCode' => 'postal_code',

    ];
}
