<?php

declare(strict_types=1);

namespace Inisiatif\Procurement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @internal
 */
final class ProcurementDetail extends Model
{
    public const CREATED_AT = 'created_stamp';

    public const UPDATED_AT = 'updated_stamp';

    protected $guarded = [];

    public function getConnectionName(): string
    {
        return \config('procurement.connection', parent::getConnectionName());
    }

    public function getTable(): string
    {
        return \config('procurement.tables.procurement_detail', parent::getTable());
    }

    public function procurement(): BelongsTo
    {
        return $this->belongsTo(Procurement::class);
    }

    public static function createNew(array $attributes): self
    {
        /** @var self */
        return self::query()->create([
            ...$attributes,
            'subtotal_discount' => 0,
            'tax_exempt' => false,
            'tax_subtotal' => 0,
            'status_id' => 1,
            'project_budget_detail_id' => null,
            'purchase_order_id' => null,
        ]);
    }
}
