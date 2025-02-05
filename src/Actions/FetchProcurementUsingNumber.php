<?php

declare(strict_types=1);

namespace Inisiatif\Procurement\Actions;

use Inisiatif\Procurement\Models\Procurement;

final class FetchProcurementUsingNumber
{
    public function handle(string $procurementNo): Procurement
    {
            $builder = Procurement::query()
                ->where('procurement_no', $procurementNo)
                ->with(['type', 'category', 'details'])->first();

            return $builder;
    }
}
