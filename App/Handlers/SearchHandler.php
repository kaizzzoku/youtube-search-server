<?php

namespace App\Handlers;

use App\Services\ApiService;

class SearchHandler extends Handler
{
    private const COUNT = 5;
    private const ORDER = 'viewCount';
    private const SEARCH_PARAM = 'q';
    private const ORDER_PARAM = 'order';
    private const COUNT_PARAM = 'count';

    public function handle()
    {
        $api_key = $this->core->getConfig()['api']['key'];

        $params = $this->core->getQueryParams();

        $q = $params[self::SEARCH_PARAM] ?? '';
        $count = $params[self::COUNT_PARAM] ?? self::COUNT;
        $order = $params[self::ORDER_PARAM] ?? self::ORDER;

        $service = new ApiService();
        $response = $service->getList($q, $api_key, $count, $order);

        return $response;
    }
}