<?php

abstract class Animal
{
    protected string $animal;
    protected string $placeOfResidence;
    protected string $walk;

    protected abstract function meal(int $weight): string;
}
