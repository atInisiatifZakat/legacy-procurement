<?php

declare(strict_types=1);

namespace Inisiatif\Procurement;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class ProcurementServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('procurement')->hasConfigFile();
    }
}
