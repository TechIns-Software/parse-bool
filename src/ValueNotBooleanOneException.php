<?php

namespace Techins\ParseBool;

class ValueNotBooleanOneException extends \InvalidArgumentException
{
    public function __construct(string $message = "", int $code = 0, \Throwable $previous = null)
    {
        $message = "Value is not valie boolean - ".$message;
        parent::__construct($message,$code,$previous);
    }
}