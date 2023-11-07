<?php

declare(strict_types=1);

namespace Inisiatif\Procurement\Http\Controllers;

use Illuminate\Http\Request;
use Inisiatif\Procurement\Models\Procurement;
use Illuminate\Http\Resources\Json\JsonResource;
use Inisiatif\Procurement\Actions\FetchProcurement;
use Inisiatif\Procurement\Actions\StoreNewProcurement;
use Inisiatif\Procurement\DataTransfers\NewProcurementData;
use Inisiatif\Procurement\Actions\FetchProcurementCollection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class ProcurementController
{
    public function index(Request $request, FetchProcurementCollection $procurementCollection): AnonymousResourceCollection
    {
        return JsonResource::collection(
            $procurementCollection->handle($request)
        );
    }

    public function show(Procurement $procurement, FetchProcurement $fetchProcurement): JsonResource
    {
        return JsonResource::make(
            $fetchProcurement->handle($procurement)
        );
    }

    public function store(Request $request, StoreNewProcurement $newProcurement): JsonResource
    {
        return JsonResource::make($newProcurement->handle(
            NewProcurementData::from([
                ...$request->except(['procurement_date', 'due_date']),
                'procurement_date' => $request->date('procurement_date'),
                'due_date' => $request->date('due_date'),
            ])
        ));
    }
}
