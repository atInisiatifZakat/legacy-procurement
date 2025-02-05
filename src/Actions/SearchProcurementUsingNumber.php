<?php

declare(strict_types=1);

namespace Inisiatif\Procurement\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Inisiatif\Procurement\Models\Procurement;

final class SearchProcurementUsingNumber
{
    public function handle(Request $request): Collection | null
    {
        $searchTerm = $request->string('q')
        ->wrap('%', '%')
        ->toString();

        if($request->query('q')){
            $builder = Procurement::query()
            ->when($searchTerm, function (Builder $builder) use ($searchTerm): Builder {
                return $builder->where(function (Builder $query) use ($searchTerm): void {
                    /** @psalm-suppress  PossiblyNullArgument */
                    $value = \mb_strtolower($searchTerm, 'UTF8');

                    $query->orWhereRaw('LOWER(procurement_no) LIKE ? ', "%{$value}%");
                });
            })->with(['type', 'category', 'details'])->get();

            return $builder;
        }

        return null;

    }
}
