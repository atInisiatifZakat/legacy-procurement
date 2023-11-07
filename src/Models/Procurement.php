<?php

declare(strict_types=1);

namespace Inisiatif\Procurement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Procurement extends Model
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
        return \config('procurement.tables.procurement', parent::getTable());
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(ProcurementType::class, 'procurement_type_id');
    }

    public function details(): HasMany
    {
        return $this->hasMany(ProcurementDetail::class);
    }

    public static function createNew(array $attributes): self
    {
        /** @var self */
        return self::query()->create([
            ...$attributes,
            'request_type_id' => 1,
            'request_status_id' => 4,
            'company_id' => 2,
            'vendor_id' => 1,
            'procurement_method_id' => 1,
            'subtotal_discount' => 0,
            'tax_exempt' => false,
            'tax_subtotal' => 0,
            'delivery_cost' => 0,
            'procurement_status_id' => 1,
            'sent' => 0,
            'metadata' => '{"nama_yayasan":null,"no_kontak_yayasan":null,"alamat_pengiriman":"","nama_relawan":null,"no_kontak_relawan":null,"notes_for_vendor":null}',
            'directorate_id' => null,
            'po_no_last_alphabet' => null,
        ]);
    }
}
