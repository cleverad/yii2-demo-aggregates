<?php

namespace app\entities\Employee;

use Assert\Assertion;

class Phone
{
    private $country;
    private $code;
    private $number;

    public function __construct($country, $code, $number)
    {
        Assertion::notEmpty($country);
        Assertion::notEmpty($code);
        Assertion::notEmpty($number);

        $this->country = $country;
        $this->code = $code;
        $this->number = $number;
    }

    public function isEqualTo(self $phone)
    {
        return $this->getFull() === $phone->getFull();
    }

    public function getFull()
    {
        return '+' . $this->country . ' (' . $this->code . ') ' . $this->number;
    }

    public function getCountry() { return $this->country; }
    public function getCode() { return $this->code; }
    public function getNumber() { return $this->number; }
}
