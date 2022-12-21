<?php

class Buyer
{
    private string $surname;
    private string $name;
    private string $patronymic;
    private array $address;
    private string $creditCardNumber;
    private int $bankAccountNumber;

    public function __construct()
    {
        $this->surname = "";
        $this->name = "";
        $this->patronymic = "";
        $this->bankAccountNumber = 0;
        $this->creditCardNumber = "000000000";
        $this->address[0] = "";
        $this->address[1] = "";
        $this->address[3] = "";
    }

    public function setSurname(string $hSurname)
    {
        $this->surname = $hSurname;
    }

    public function setName(string $hName)
    {
        $this->name = $hName;
    }

    public function setPatronymic(string $hPatronymic)
    {
        $this->patronymic = $hPatronymic;
    }

    public function setAddress(string $street, string $home, string $flat)
    {
        $this->address[0] = $street;
        $this->address[1] = $home;
        $this->address[2] = $flat;
    }

    public function setCreditCardNumber(string $number)
    {
        $this->creditCardNumber = $number;
    }

    public function setBankAccountNumber(int $number)
    {
        $this->bankAccountNumber = $number;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPatronymic(): string
    {
        return $this->patronymic;
    }

    public function getAddress(): string
    {
        return $this->address[0] . ',' . $this->address[1] .
            ',' . $this->address[2];
    }

    public function getCreditCardNumber(): string
    {
        return $this->creditCardNumber;
    }

    public function getBankAccountNumber(): int
    {
        return $this->bankAccountNumber;
    }

    public function getAlphabetSort(array $list): string
    {
        $result = "";
        sort($list);
        foreach ($list as $user)
            $result .= $user->getName() . "\n";
        return $result;
    }
    public function getNumberCard(array $list,string $num):string{
        $result = "";
        foreach ($list as $user) {
            if (strripos($user->getCreditCardNumber(), $num)) {
                $result .= $user->getName() . "\n";
                $result .= $user->getCreditCardNumber() . "\n";
            }
        }
        return $result;
    }

    public function information(): string
    {
        $inf = $this->surname . "\n";
        $inf .= $this->name . "\n";
        $inf .= $this->patronymic . "\n";
        $inf .= $this->bankAccountNumber . "\n";
        $inf .= $this->creditCardNumber . "\n";
        $inf .= $this->address[0] . ",";
        $inf .= $this->address[1] . ",";
        $inf .= $this->address[3] . "\n";
        return $inf;
    }
}