<?php

namespace Apilayer\Currencylayer\Exceptions;

use Exception;
use Throwable;

class ApiFailedResponseException extends Exception
{
    private array $rawErrorResponse;

    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     * @param array $rawErrorResponse
     */
    public function __construct(
        $message = "",
        $code = 0,
        Throwable $previous = null,
        array $rawErrorResponse
    ) {
        parent::__construct($message, $code, $previous);
        $this->rawErrorResponse = $rawErrorResponse;
    }

    public function getRawErrorResponse(): array
    {
        return $this->rawErrorResponse;
    }
}
