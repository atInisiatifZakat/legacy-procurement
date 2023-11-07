<?php

declare(strict_types=1);

namespace Inisiatif\Procurement\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Inisiatif\Procurement\ProcurementServiceProvider;

final class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            ProcurementServiceProvider::class,
        ];
    }
}
