<?php

declare(strict_types=1);

namespace Inisiatif\Procurement\Actions;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Inisiatif\Procurement\Models\Procurement;
use Inisiatif\Procurement\Models\ProcurementDetail;
use Inisiatif\Procurement\DataTransfers\NewProcurementData;
use Inisiatif\Procurement\DataTransfers\ProcurementDetailData;

final class StoreNewProcurement
{
    public function handle(NewProcurementData $data): Procurement
    {
        $procurementNumber = $this->generateProcurementNumber();

        return DB::transaction(static function () use ($data, $procurementNumber): Procurement {
            $procurement = Procurement::createNew([
                ...$data->except('items')->toArray(), 'procurement_no' => $procurementNumber,
            ]);

            $data->items->each(function (ProcurementDetailData $data) use ($procurement): void {
                $subtotal = $data->price * $data->quantity;

                ProcurementDetail::createNew([
                    ...$data->toArray(),
                    'procurement_id' => $procurement->getKey(),
                    'subtotal' => $subtotal,
                    'total' => $subtotal,
                    'request_price' => $data->price,
                ]);
            });

            return $procurement;
        });
    }

    protected function generateProcurementNumber(): string
    {
        $latest = Procurement::query()->whereNotNull('procurement_no')->latest('procurement_no')->first();

        if (! $latest) {
            return \sprintf('P-%s-0000', now()->format('y'));
        }

        $lastNumber = (int) Str::substr($latest->getAttribute('procurement_no'), -4);

        return \sprintf('P-%s-%s', now()->format('y'), ++$lastNumber);
    }
}
