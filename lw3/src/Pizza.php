<?php

namespace pepe\lw3;

abstract class Pizza
{
    public string $name;
    public string $sauce;
    public array $toppings;

    public function prepare()
    {
        echo "Началась готовка пиццы {$this->name}";
        echo "Добавлен соус {$this->sauce}";
        echo "Добавлены топики: ";
        foreach ($this->toppings as $part) {
            echo "$part\n";
        }
    }
    public function cut(){
        echo "Данную пиццу нарезают по диагонали";
    }
}