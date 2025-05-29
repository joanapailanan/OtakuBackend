<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WaifuService
{
    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.waifu.api_url');
    }

    /**
     * Fetch a waifu image from the Waifu Pics API.
     */
    public function fetchImage(string $type, string $category): ?array
    {
        if (!in_array(strtolower($type), ['sfw', 'nsfw'])) {
            throw new \Exception("Invalid type: {$type}. Must be 'sfw' or 'nsfw'.");
        }

        $validCategories = [
            'sfw' => [
                'waifu', 'neko', 'shinobu', 'megumin', 'bully', 'cuddle', 'hug', 'awoo',
                'pat', 'smug', 'bonk', 'blush', 'smile', 'wave', 'happy', 'dance'
            ],
            'nsfw' => ['waifu', 'neko', 'trap']
        ];

        if (!in_array(strtolower($category), $validCategories[strtolower($type)])) {
            throw new \Exception("Invalid category: {$category} for type {$type}.");
        }

        $url = "{$this->baseUrl}/{$type}/{$category}";

        try {
            $response = Http::timeout(10)->get($url);

            if ($response->successful()) {
                return $response->json();
            }

            throw new \Exception("Waifu API returned status: {$response->status()} - {$response->body()}");
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            throw new \Exception("Failed to connect to Waifu API: {$e->getMessage()}");
        }
    }
}