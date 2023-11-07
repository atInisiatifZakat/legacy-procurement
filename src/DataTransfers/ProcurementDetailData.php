<?php

declare(strict_types=1);

namespace Inisiatif\Procurement\DataTransfers;

use Spatie\LaravelData\Data;

final class ProcurementDetailData extends Data
{
    public function __construct(
        public readonly string $itemName,
        public readonly int $budgetId,
        public readonly int|string $budgetCode,
        public readonly float|int $price,
        public readonly int $quantity = 1,
        public readonly ?string $note = null,
    ) {
    }
}
