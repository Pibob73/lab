<?php
require_once 'Interface.php';

class Disk implements root
{
    public string $name;
    public array $element;

    function __construct(string $n){
        $name = $n;
    }
    public function render(): string
    {
        $branch = '';
        foreach ($this->element as $element) {
            $branch .= $element->render()."\n";
        }
        return $branch;
    }

    public function addElement(root $path)
    {
        $this->element[] = $path;
    }
}