<?php
class User
{
    public string $name;
    public string $password;
    public DateTime $birthday;
    function __construct(string $name, string $pass, DateTime $birthday)
    {
        $this->name = $name;
        $this->password = $pass;
        $this->birthday = $birthday;
    }
}
