<?php

class Direct implements root
{
    /**
     * @var root[]
     */
    public array $paths;

    public string $name;

    public function record(string $name, array $files)
    {
        $this->name = $name;
        $this->paths = $files;
    }

    public function render(): string
    {
        $branch = "{$this->name} \n";
        foreach ($this->paths as $path) {
            $branch .= '-' . $path->render()."\n";
        }
        return $branch;
    }
}