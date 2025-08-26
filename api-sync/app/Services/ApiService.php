<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiService
{
    protected string $baseUrl = "http://109.73.206.144:6969/api";
    protected string $token   = "E6kUTYrYwZq2tN4QEtyzsbEBk3ie";

    /**
     * Fetch data from API with pagination
     */
    public function fetch(string $endpoint, array $params = []): array
    {
        $params['key'] = $this->token;
        $page = 1;
        $allData = [];

        do {
            $params['page'] = $page;
            $params['limit'] = $params['limit'] ?? 500;
            $response = Http::get($this->baseUrl . "/$endpoint", $params);
            $data = $response->json('data') ?? [];
            $allData = array_merge($allData, $data);
            $page++;
        } while (!empty($data));

        return $allData;
    }
}
