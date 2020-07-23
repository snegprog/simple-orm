<?php

declare(strict_types=1);

namespace Snegprog\SimpleORM\Exceptions;

class InvalidArgumentException extends \Exception
{
    /**
     * InvalidArgumentException constructor.
     */
    public function __construct(string $message, int $code = 0)
    {
        parent::__construct($message, $code);
    }
}
