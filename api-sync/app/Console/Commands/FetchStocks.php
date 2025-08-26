<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ApiService;
use App\Models\Stock;

class FetchStocks extends Command
{
    protected $signature = 'fetch:stocks {--from=}';
    protected $description = 'Fetch stocks from API and save to DB (current day)';

    public function handle(ApiService $api)
    {
        $dateFrom = $this->option('from') ?? now()->format('Y-m-d');

        $this->info("Fetching stocks for $dateFrom...");

        $data = $api->fetch('stocks', [
            'dateFrom' => $dateFrom,
        ]);

        foreach ($data as $item) {
            Stock::updateOrCreate(
                ['sku' => $item['sku'] ?? null, 'warehouse_name' => $item['warehouse_name'] ?? null],
                [
                    'quantity' => $item['quantity'] ?? null,
                    'date' => $item['date'] ?? $dateFrom,
                ]
            );
        }

        $this->info("Stocks synced: " . count($data));
    }
}
