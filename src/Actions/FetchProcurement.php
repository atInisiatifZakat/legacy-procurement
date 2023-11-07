<?php

declare(strict_types=1);

namespace Inisiatif\Procurement\Actions;

use Inisiatif\Procurement\Models\Procurement;

final class FetchProcurement
{
    public function handle(Procurement|int $procurement): Procurement
    {
        if ($procurement instanceof Procurement) {
            return $procurement->loadMissing(['type', 'details']);
        }

        /** @var Procurement */
        return Procurement::query()->with(['type', 'details'])->findOrFail($procurement);
    }
}
