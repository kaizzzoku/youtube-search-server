<?php


namespace App\Services;


class ApiService
{
    private const LIST_URL = 'https://www.googleapis.com/youtube/v3/search';

    public function getList(string $q, string $key, int $count, string $order)
    {
        $query = http_build_query([
            'key' => $key,
            'maxResults' => $count,
            'order' => $order,
            'part' => 'snippet',
            'q' => $q,
        ]);

        $response = $this->makeRequest(self::LIST_URL.'?'.$query);
        return $response;
    }

    private function makeRequest(string $url)
    {
        return file_get_contents($url);
    }
}