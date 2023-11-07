<?php

declare(strict_types=1);

namespace Inisiatif\Procurement\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @internal
 */
final class ProcurementType extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function getConnectionName(): string
    {
        return \config('procurement.connection', parent::getConnectionName());
    }

    public function getTable(): string
    {
        return \config('procurement.tables.procurement_type', parent::getTable());
    }
}
