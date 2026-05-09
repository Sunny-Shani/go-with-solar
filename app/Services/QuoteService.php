<?php

require_once dirname(__DIR__) . '/config/bootstrap.php';

class QuoteService
{
    public function randomQuote(): array
    {
        $apiKey = app_config('rapidapi.quotes_key', '');
        if ($apiKey === '' || substr($apiKey, 0, 5) === 'your-') {
            return ['name' => '', 'quote' => ''];
        }

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://quotes15.p.rapidapi.com/quotes/random/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 15,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => [
                'X-RapidAPI-Host: quotes15.p.rapidapi.com',
                'X-RapidAPI-Key: ' . $apiKey,
            ],
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);

        if ($error || !$response) {
            error_log('Quote API error: ' . $error);
            return ['name' => '', 'quote' => ''];
        }

        $data = json_decode($response, true);
        if (!is_array($data)) {
            error_log('Quote API returned invalid JSON.');
            return ['name' => '', 'quote' => ''];
        }

        return [
            'name' => $data['originator']['name'] ?? '',
            'quote' => $data['content'] ?? '',
        ];
    }
}
