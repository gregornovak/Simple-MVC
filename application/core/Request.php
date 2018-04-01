<?php

namespace Gregor\Core;

class Request
{
    public function get(mixed $param) : string
    {
        return filter_input(trim(INPUT_GET), $param, FILTER_SANITIZE_STRING) ?? '';
    }

    public function post(string $param) : string
    {
        return filter_input(trim(INPUT_POST), $param, FILTER_SANITIZE_STRING) ?? '';
    }
}