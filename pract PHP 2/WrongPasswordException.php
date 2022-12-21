<?php

class WrongPasswordException extends Exception
{
    function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        echo 'wrong password';
        parent::__construct($message, $code, $previous);
    }
}