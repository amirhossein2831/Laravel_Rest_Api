<?php

namespace App\Filter;

use Illuminate\Http\Request;

class ApiFilter
{
    protected array $safeParam = [];
    protected array $columnMap = [];
    protected array $opraitorMap = [
        'gt' => '>',
        'lt' => '<',
        'eq' => '=',
    ];

    public function transform(Request $request): array
    {
        $whereClause = [];
        foreach ($this->safeParam as $param => $operators) {
            $query = $request->query($param);
            $column = $this->columnMap[$param] ?? $param;
            if (!isset($query)) {
                continue;
            }
            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $whereClause[] = [$column, $this->opraitorMap[$operator], $query[$operator]];
                }
            }
        }
        return $whereClause;
    }


}
