<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ApiService;
use App\Models\Sale;

class FetchSales extends Command
{
    protected $signature = 'fetch:sales {--from=} {--to=}';
    protected $description = 'Fetch sales from API and save to DB';

    public function handle(ApiService $api)
    {
        $dateFrom = $this->option('from') ?? now()->subMonth()->format('Y-m-d');
        $dateTo   = $this->option('to') ?? now()->format('Y-m-d');

        $this->info("Fetching sales from $dateFrom to $dateTo...");

        $data = $api->fetch('sales', [
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo,
        ]);

        foreach ($data as $item) {
            Sale::updateOrCreate(
                ['sale_id' => $item['sale_id'] ?? null],
                [
                    'date' => $item['date'] ?? null,
                    'product_name' => $item['product_name'] ?? null,
                    'supplier_article' => $item['supplier_article'] ?? null,
                    'tech_size' => $item['tech_size'] ?? null,
                    'price' => $item['price'] ?? null,
                    'quantity' => $item['quantity'] ?? null,
                    'total_price' => $item['total_price'] ?? null,
                    'warehouse_name' => $item['warehouse_name'] ?? null,
                ]
            );
        }

        $this->info("Sales synced: " . count($data));
    }
}
