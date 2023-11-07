<?php

declare(strict_types=1);

namespace Inisiatif\Procurement\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @internal
 */
final class Branch extends Model
{
    public function getConnectionName(): string
    {
        return \config('procurement.connection', parent::getConnectionName());
    }

    public function getTable(): string
    {
        return \config('procurement.tables.branch', parent::getTable());
    }
}
