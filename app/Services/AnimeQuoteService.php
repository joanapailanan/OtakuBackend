<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class AnimeQuoteService
{
    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.animechan.api_url');
    }

    public function getRandomQuote(): array
    {
        try {
            $response = Http::timeout(10)->get("{$this->baseUrl}/quotes/random");

            if ($response->successful()) {
                $data = $response->json();
                return [
                    'success' => true,
                    'data' => [
                        'quote' => $data['quote'] ?? 'No quote provided',
                        'character' => $data['character'] ?? 'Unknown character',
                        'anime' => $data['anime'] ?? 'Unknown anime',
                    ],
                ];
            }

            return [
                'success' => false,
                'message' => 'Failed to fetch anime quote.',
                'error' => $response->body(),
                'status' => $response->status(),
            ];
        } catch (RequestException $e) {
            throw new \Exception("Failed to connect to AnimeChan API: {$e->getMessage()}", 500);
        } catch (\Exception $e) {
            throw new \Exception("Error fetching anime quote: {$e->getMessage()}", 500);
        }
    }
}
