<?php

declare(strict_types=1);

namespace Inisiatif\Procurement\Models;

use Illuminate\Database\Eloquent\Model;

final class RequestType extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    protected $casts = [
        'last_no' => 'int',
    ];

    public function getConnectionName(): string
    {
        return \config('procurement.connection', parent::getConnectionName());
    }

    public function getTable(): string
    {
        return \config('procurement.tables.request_type', parent::getTable());
    }
}
