<?php

require './vendor/autoload.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

error_reporting(E_ALL);
ini_set("display_errors", 1);

if (!getenv('WITHOUT_ENV_FILE')) {
    (new \App\Env('.env'))->load();
}

$core = new App\Core();

$core->handle();