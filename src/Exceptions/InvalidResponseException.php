<?php

namespace Ypl\Transistor\Exceptions;

use Exception;
use Throwable;

class InvalidResponseException extends Exception
{
    /**
     * @var
     */
    protected $baseResponse;

    /**
     * InvalidResponse constructor.
     * @param string $message
     * @param $baseResponse
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($baseResponse, string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->baseResponse = $baseResponse;
    }

    /**
     * Get base response.
     *
     * @return mixed
     */
    public function getBaseResponse()
    {
        return $this->baseResponse;
    }
}
