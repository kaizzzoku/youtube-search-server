<?php


namespace App\Services;


class ApiService
{
    private const SEARCH_URL = 'https://www.googleapis.com/youtube/v3/search';
    private const VIDEOS_URL = 'https://www.googleapis.com/youtube/v3/videos';

    public function getNewVideos(string $q, string $key, int $count, string $order)
    {
        $query = http_build_query([
            'key' => $key,
            'maxResults' => $count,
            'order' => $order,
            'q' => $q,
            'type' => 'video',
        ]);

        $response = $this->makeRequest(self::SEARCH_URL.'?'.$query);

        return $response;
    }

    public function getVideosByIds(string $key, array $ids)
    {
        $query = http_build_query([
            'key' => $key,
            'part' => 'snippet,contentDetails,statistics',
            'id' => implode(',', $ids),
        ]);

        $response = $this->makeRequest(self::VIDEOS_URL.'?'.$query);

        return $response;
    }

    public function sortVideosByViewCount(array $videos)
    {
        if (array_key_exists('statistics', $videos[0])) {
            usort($videos, function ($v1, $v2) {
                return (int) ($v1['statistics']['viewCount'] <  $v2['statistics']['viewCount']);
            });
        }

        return $videos;
    }

    private function makeRequest(string $url)
    {
        return file_get_contents($url);
    }
}