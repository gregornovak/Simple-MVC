<?php

namespace Gregor\Core;

use Gregor\Core\View;

class Error
{
    public function __construct(string $template, string $errorMessage = '')
    {
        $errorMessage = $errorMessage ?? 'There has been an error with your request.';
        return new View($template, ['error' => $errorMessage]);
    }
}