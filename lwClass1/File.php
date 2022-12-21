<?php
require_once 'Interface.php';

class File implements root
{
    public string $nameOfFile;

    function __construct(string $name)
    {
        $this->nameOfFile = $name;
    }

    public function render(): string
    {
        return $this->nameOfFile;
    }
}