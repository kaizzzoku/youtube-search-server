<?php

namespace App;

use App\Handlers\Handler;
use http\Params;

class Core
{
    private const HANDLER = Handler::class;
    private const CONFIG_PATH = './config.php';
    private const ROUTES_PATH = './routes.php';
    private array $config;
    private array $routes;
    private array $env;
    private array $get;
    private string $url;
    private array $request;

    public function __construct()
    {
        $this->setConfig();
        $this->setRoutes();
        $this->setGlobalVariables();
    }

    public function handle()
    {
        if (array_key_exists($this->url, $this->routes) && is_subclass_of($this->routes[$this->url], self::HANDLER)) {
            $handler = new $this->routes[$this->url]($this);
            $response = $handler->handle();
            echo $response;

        } else {
            http_response_code(404);
            echo 'Not Found';
        }
    }

    private function setConfig()
    {
        $this->config = require(self::CONFIG_PATH);
    }

    private function setRoutes()
    {
        $this->routes = require(self::ROUTES_PATH ?? $this->config['routes']['path']);
    }

    private function setGlobalVariables()
    {
        $this->env = $_ENV;
        $this->request = $_SERVER;
        $this->get = $_GET;
        $this->url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getEnv()
    {
        return $this->env;
    }

    public function getQueryParams()
    {
        return $this->get;
    }
}