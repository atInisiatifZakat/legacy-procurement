<?php

declare(strict_types=1);

return [
    'connection' => env('INTRANET_CONNECTION', 'intranet'),

    'tables' => [
        'branch' => env('INTRANET_TABLE_EMPLOYEE', 'public.com_branch'),

        'employee' => env('INTRANET_TABLE_EMPLOYEE', 'public.sdm_employee'),

        'procurement' => env('INTRANET_TABLE_PROCUREMENT', 'eproc.procurement'),

        'procurement_detail' => env('INTRANET_TABLE_PROCUREMENT_DETAIL', 'eproc.procurement_detail'),

        'procurement_type' => env('INTRANET_TABLE_PROCUREMENT_TYPE', 'eproc.procurement_type'),

        'procurement_category' => env('INTRANET_TABLE_PROCUREMENT_TYPE', 'eproc.procurement_category'),
    ],
];
