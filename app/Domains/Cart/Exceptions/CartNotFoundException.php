<?php

declare(strict_types=1);

namespace App\Domains\Cart\Exceptions;

use Exception;
use Throwable;

final class CartNotFoundException extends Exception
{
    /**
     * CartNotFoundException constructor.
     */
    public function __construct(string $message = 'Cart not found', int $code = 404, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
