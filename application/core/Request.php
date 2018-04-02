<?php

namespace Gregor\Core;

class Request
{
    public function get(mixed $param) : string
    {
        return filter_input(trim(INPUT_GET), $param, FILTER_SANITIZE_MAGIC_QUOTES) ?? '';
    }

    public function post(string $param) : string
    {
        return filter_input(trim(INPUT_POST), $param, FILTER_SANITIZE_MAGIC_QUOTES) ?? '';
    }

    public function sanitize(string $param) : string
    {
        return filter_var($param, FILTER_SANITIZE_MAGIC_QUOTES) ?? '';
    }
}