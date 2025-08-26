<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ApiService;
use App\Models\Income;

class FetchIncomes extends Command
{
    protected $signature = 'fetch:incomes {--from=} {--to=}';
    protected $description = 'Fetch incomes from API and save to DB';

    public function handle(ApiService $api)
    {
        $dateFrom = $this->option('from') ?? now()->subMonth()->format('Y-m-d');
        $dateTo   = $this->option('to') ?? now()->format('Y-m-d');

        $this->info("Fetching incomes from $dateFrom to $dateTo...");

        $data = $api->fetch('incomes', [
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo,
        ]);

        foreach ($data as $item) {
            Income::updateOrCreate(
                ['income_id' => $item['income_id'] ?? null],
                [
                    'date' => $item['date'] ?? null,
                    'total_amount' => $item['total_amount'] ?? null,
                    'expenses' => $item['expenses'] ?? null,
                    'profit' => $item['profit'] ?? null,
                    'warehouse_name' => $item['warehouse_name'] ?? null,
                ]
            );
        }

        $this->info("Incomes synced: " . count($data));
    }
}
