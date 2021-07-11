<?php

namespace App\Handlers;

use App\Core;

abstract class Handler
{
    protected Core $core;

    public function __construct(Core $core)
    {
        $this->core = $core;
    }

    public abstract function handle();
}