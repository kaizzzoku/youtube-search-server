<?php

require './vendor/autoload.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

(new \App\Env('.env'))->load();

$core = new App\Core();

$core->handle();