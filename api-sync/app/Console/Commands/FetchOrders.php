<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ApiService;
use App\Models\Order;

class FetchOrders extends Command
{
    protected $signature = 'fetch:orders {--from=} {--to=}';
    protected $description = 'Fetch orders from API and save to DB';

    public function handle(ApiService $api)
    {
        $dateFrom = $this->option('from') ?? now()->subMonth()->format('Y-m-d');
        $dateTo   = $this->option('to') ?? now()->format('Y-m-d');

        $this->info("Fetching orders from $dateFrom to $dateTo...");

        $data = $api->fetch('orders', [
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo,
        ]);

        foreach ($data as $item) {
            Order::updateOrCreate(
                ['g_number' => $item['g_number'] ?? null],
                [
                    'date' => $item['date'] ?? null,
                    'last_change_date' => $item['last_change_date'] ?? null,
                    'supplier_article' => $item['supplier_article'] ?? null,
                    'tech_size' => $item['tech_size'] ?? null,
                    'barcode' => $item['barcode'] ?? null,
                    'total_price' => $item['total_price'] ?? null,
                    'discount_percent' => $item['discount_percent'] ?? null,
                    'warehouse_name' => $item['warehouse_name'] ?? null,
                    'oblast' => $item['oblast'] ?? null,
                    'income_id' => $item['income_id'] ?? null,
                    'sale_id' => $item['sale_id'] ?? null,
                ]
            );
        }

        $this->info("Orders synced: " . count($data));
    }
}
