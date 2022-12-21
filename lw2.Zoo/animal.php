<?php
abstract class animal{
    protected string $animal;
    protected string $placeOfResidence;
    protected string $Walk;
    protected abstract function meal(int $weight): string;
}
