<?php

declare(strict_types=1);

namespace Inisiatif\Procurement\DataTransfers;

use DateTime;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Inisiatif\Procurement\Models\Branch;
use Inisiatif\Procurement\Models\Employee;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Inisiatif\Procurement\Models\ProcurementType;
use Spatie\LaravelData\Attributes\Validation\Date;
use Spatie\LaravelData\Attributes\Validation\Uuid;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Inisiatif\Procurement\Models\ProcurementCategory;
use Spatie\LaravelData\Attributes\Validation\Numeric;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;

#[MapName(SnakeCaseMapper::class)]
final class NewProcurementData extends Data
{
    public function __construct(
        #[Required, Exists(Employee::class, 'id')]
        public readonly string|int $employeeId,

        #[Required, Exists(Branch::class, 'id')]
        public readonly string|int $branchId,

        #[Required]
        public readonly string $description,

        #[Required, Exists(ProcurementType::class, 'id')]
        public readonly string $procurementTypeId,

        #[Required, Exists(ProcurementCategory::class, 'id')]
        public readonly string $procurementCategoryId,

        #[Required, Date]
        public readonly DateTime $procurementDate,

        #[Required, Date]
        public readonly DateTime $dueDate,

        #[Required, Numeric]
        public readonly float|int $subtotal,

        #[Required, Numeric]
        public readonly float|int $total,

        #[DataCollectionOf(ProcurementDetailData::class)]
        public readonly DataCollection $items,

        #[Nullable, Uuid]
        public readonly ?string $distributionProcurementId = null,

        #[Nullable, StringType]
        public readonly ?string $note = null,
    ) {
    }
}
