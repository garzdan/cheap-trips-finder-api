<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class ApiException extends Exception
{
    protected $textCode;
    protected $description;

    public function __construct($textCode, $message = "", $description = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->textCode = $textCode;
        $this->description = $description;
    }

    public function getTextCode() {
        return $this->textCode;
    }

    public function getDescription() {
        return $this->description;
    }
}
