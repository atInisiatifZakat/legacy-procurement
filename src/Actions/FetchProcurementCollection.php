<?php

declare(strict_types=1);

namespace Inisiatif\Procurement\Actions;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Inisiatif\Procurement\Models\Procurement;
use Illuminate\Contracts\Pagination\CursorPaginator;

final class FetchProcurementCollection
{
    public function handle(Request $request): CursorPaginator
    {
        $builder = Procurement::query()->with([
            'type', 'details',
        ]);

        return QueryBuilder::for($builder, $request)->allowedFilters([
            AllowedFilter::exact('distribution', 'distribution_id'),
        ])->cursorPaginate()->withQueryString();
    }
}
