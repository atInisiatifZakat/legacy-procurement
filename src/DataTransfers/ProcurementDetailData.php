<?php

declare(strict_types=1);

namespace Inisiatif\Procurement\DataTransfers;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
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
